<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var dosageFormObject = {
        activebDosageFormID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#DosageFormName').val()) {
                is_valid = false;
                $('.dosage-form-name-require-message').show();
            }

            return is_valid;
        },
        showDosageFormCreateModal: function () {
            dosageFormObject.activebDosageFormID = '';
            $('.error-message').hide();
            $('#dosageform_modal').html('Create');
            $('#DosageFormName').val('');
            $('#addDosageFormModal').modal('show');
        },
        showDosageFormEditModal: function (dosageformID, dosageformName) {
            dosageFormObject.activebDosageFormID = dosageformID;
            $('.error-message').hide();
            $('#dosageform_modal').html('Update');
            $('#DosageFormName').val(dosageformName);
            $('#addDosageFormModal').modal('show');
        },
        deleteDosageForm: function (dosageFormID) {
            console.log('Method Name: dosageFormObject.deleteDosageForm');
            var formURL = "<?php echo site_url('DosageForm/deleteDosageForm');?>?DosageFormID="+dosageFormID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'dosageFormObject.deleteDosageForm', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    dosageFormObject.populateDosageFormList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitDosageFormModal: function () {
            var is_valid = dosageFormObject.validateForm();
            if (!is_valid) return;
            $('#addDosageFormModal').modal('hide');
            var formURL = dosageFormObject.activebDosageFormID == '' ? "<?php echo site_url('DosageForm/addDosageForm');?>" : "<?php echo site_url('DosageForm/updateDosageForm');?>?DosageFormID="+dosageFormObject.activebDosageFormID;
            var postData = $('form#addNewDosageForm').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'dosageFormObject.submitDosageFormModal', function(data){
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showSidePopUp('Error!!!',data.error_msg, false);
                    } else if (data.result){
                        var success_msg = 'You have successfully added a dosageform.';
                        mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                        dosageFormObject.populateDosageFormList();
                    }
                }
            });
        },
        populateDosageFormList: function() {
            var formURL = "<?php echo site_url('DosageForm/getAllActiveDosageFormInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'dosageFormObject.getDosageFormList', function(dosageformData){
                var dosageform_tr_text = '';
                $('tbody.dosageform-list').html('');
                for(var i = 0; i < dosageformData.length; i++) {
                    dosageform_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="dosageFormObject.showDosageFormEditModal('+dosageformData[i].ID+')">'+dosageformData[i].Name+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="dosageFormObject.showDosageFormEditModal('+dosageformData[i].ID+',\''+dosageformData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="dosageFormObject.deleteDosageForm('+dosageformData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.dosageform-list').append(dosageform_tr_text);
                }
            });
        }
    }
</script>
