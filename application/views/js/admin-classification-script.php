<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var classificationObject = {
        activebClassificationID: '',
        showClassificationCreateModal: function () {
            classificationObject.activebClassificationID = '';
            $('#classification_modal').html('Create');
            $('#ClassificationName').val('');
            $('#addClassificationModal').modal('show');
        },
        showClassificationEditModal: function (classificationID, classificationName) {
            classificationObject.activebClassificationID = classificationID;
            $('#classification_modal').html('Update');
            $('#ClassificationName').val(classificationName);
            $('#addClassificationModal').modal('show');
        },
        deleteClassification: function (classificationID) {
            console.log('Method Name: classificationObject.deleteClassification');
            var formURL = "<?php echo site_url('Classification/deleteClassification');?>?ClassificationID="+classificationID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'classificationObject.deleteClassification', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    classificationObject.populateClassificationList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitClassificationModal: function () {
            $('#addClassificationModal').modal('hide');
            var formURL = classificationObject.activebClassificationID == '' ? "<?php echo site_url('Classification/addClassification');?>" : "<?php echo site_url('Classification/updateClassification');?>?ClassificationID="+classificationObject.activebClassificationID;
            var postData = $('form#addNewClassification').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'classificationObject.submitClassificationModal', function(data){
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showSidePopUp('Error!!!',data.error_msg, false);
                    } else if (data.result){
                        var success_msg = 'You have successfully added a classification.';
                        mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                        classificationObject.populateClassificationList();
                    }
                }
            });
        },
        populateClassificationList: function() {
            var formURL = "<?php echo site_url('Classification/getAllActiveClassificationInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'classificationObject.getClassificationList', function(classificationData){
                var classification_tr_text = '';
                $('tbody.classification-list').html('');
                for(var i = 0; i < classificationData.length; i++) {
                    classification_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="classificationObject.showClassificationEditModal('+classificationData[i].ID+')">'+classificationData[i].Name+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="classificationObject.showClassificationEditModal('+classificationData[i].ID+',\''+classificationData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="classificationObject.deleteClassification('+classificationData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.classification-list').append(classification_tr_text);
                }
            });
        }
    }
</script>
