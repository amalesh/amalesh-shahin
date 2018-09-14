<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var jobObject = {
        activebJobID: '',
        allExistingPosition: [],
        initJobPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showJobCreateModal: function () {
            jobObject.activebJobID = '';
            $('#job_modal').html('Create');
            $('#JobTitle').val('');
            $('#JobOrganization').val('');
            $('#JobDescription').val('');
            $('#JobPosition').val('');
            $('#JobCircularImagePathThumbnail').attr('src', '');
            $('#JobApplicationDeadline').val('');
            $('#JobPublishDate').val('');
            $('#JobSalary').val('Negotiable');
            $('#JobEducationalRequirement').val('');
            $('#JobExperienceRequirement').val('');
            $('#JobNumberOfVacancy').val('');
            $('#JobAgeLimit').val('');
            $('#JobLocation').val('Anywhere in Bangladesh');
            $('#JobSource').val('Online job portal');
            $('#JobType').val('');
            $('#JobEmploymentType').val('');
            $('#JobNature').val('Full-Time');
            $('JobApplyingProcedure').val('Follow job Circular image');
            $("#JobIsActiveNo").prop("checked", true);
            $('#addJobModal').modal('show');
        },
        deleteJob: function (jobID) {
            console.log('Method Name: jobObject.deleteJob');
            var formURL = "<?php echo site_url('Job/deleteJob');?>?JobID="+jobID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.deleteJob', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    jobObject.populateJobList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitJobModal: function () {
            $('#addJobModal').modal('hide');
            var formURL = jobObject.activebJobID == '' ? "<?php echo site_url('Job/addJob');?>" : "<?php echo site_url('Job/updateJob');?>?JobID="+jobObject.activebJobID;
            var form = $('form#addNewJob');
            if (window.FormData){
                var postData = new FormData(form[0]);
            } else {
                return false;
            }

            $.ajax({
                url         : formURL,
                data        : postData,
                cache       : false,
                contentType : false,
                processData : false,
                type        : 'POST',
                dataType    : "JSONp",
                beforeSend:function(){

                },
                success:function(serverResponse, textStatus, jqXHR)
                {
                    var data = serverResponse.response;
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showSidePopUp('Error!!!',data.error_msg, false);
                        } else if (data.result){
                            var success_msg = 'You have successfully added a job.';
                            mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                            jobObject.populateJobList();
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown)
                {

                },
                statusCode: {

                },
                complete: function(){

                },
                timeout: 300000
            });
        },
        populateJobList: function() {
            var formURL = "<?php echo site_url('Job/getAllJobs')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.getJobList', function(jobData){
                var job_tr_text = '';
                $('tbody.job-list').html('');
                for(var i = 0; i < jobData.length; i++) {
                    job_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="jobObject.showJobEditModal('+jobData[i].ID+')">'+jobData[i].Title+'</a></td>' +
                        '<td>' + jobData[i].Organization + '</td>' +
                        '<td>' + jobData[i].Position + '</td>' +
                        '<td>' + jobData[i].PublishDate + '</td>' +
                        '<td>' + jobData[i].ApplicationDeadline + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="jobObject.showJobEditModal('+jobData[i].ID+',\''+jobData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="jobObject.deleteJob('+jobData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.job-list').append(job_tr_text);
                }
            });
        },
        showJobEditModal: function (jobID) {
            console.log('Method Name: jobObject.showJobEditModal');
            jobObject.activebJobID = jobID;
            var formURL = "<?php echo site_url('Job/getJobDetailInformation')?>?JobID="+jobID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.showJobEditModal', function(jobData){
                $('#JobTitle').val(jobData.Title);
                $('#JobOrganization').val(jobData.Organization);
                $('#JobDescription').val(jobData.Description);
                $('#JobPosition').val(jobData.Position);
                $('#JobCircularImagePathThumbnail').attr('src', '<?php echo base_url()?>JobImages/'+jobData.JobCircularImagePath);
                $('#JobApplicationDeadline').datepicker('setValue', jobData.ApplicationDeadline);
                $('#JobPublishDate').datepicker('setValue', jobData.PublishDate);
                $('#JobSalary').val(jobData.Salary);
                $('#JobEducationalRequirement').val(jobData.EducationalRequirement);
                $('#JobExperienceRequirement').val(jobData.ExperienceRequirement);
                $('#JobNumberOfVacancy').val(jobData.NumberOfVacancy);
                $('#JobAgeLimit').val(jobData.AgeLimit);
                $('#JobLocation').val(jobData.Location);
                $('#JobSource').val(jobData.JobSource);
                $('#JobType').val(jobData.JobType);
                $('#JobEmploymentType').val(jobData.EmploymentType);
                $('#JobNature').val(jobData.JobNature);
                $('JobApplyingProcedure').val(jobData.ApplyingProcedure);
                if (jobData.IsActive) {
                    $("#JobIsActiveYes").prop("checked", true);
                } else {
                    $("#JobIsActiveNo").prop("checked", true);
                }
            });
            $('#job_modal').html('Update');
            $('#addJobModal').modal('show');
        },
        setJobImagePathThumbnail: function (input, objectID) {
            console.log('jobObject.setJobImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    jobObject.initJobPage();
</script>
