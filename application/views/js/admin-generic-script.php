<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var genericObject = {
        activebGenericID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#GenericName').val() == '') {
                is_valid = false;
                $('.generic-name-require-message').show();
            }
            if ($('#Classification').val() == '') {
                is_valid = false;
                $('.classification-require-message').show();
            }
            if ($('#SafetyRemark').val() == '') {
                is_valid = false;
                $('.safety-remark-require-message').show();
            }

            return is_valid;
        },
        showGenericCreateModal: function () {
            genericObject.activebGenericID = '';
            $('.error-message').hide();
            $('#generic_modal').html('Create');
            $('#GenericName').val('');
            $('#Classification').val('');
            $('#SafetyRemark').val('');
            $('#Indication').val('');
            $('#IndicationTags').val('');
            $('#DosageAdministration').val('');
            $('#ContraindicationPrecaution').val('');
            $('#SideEffect').val('');
            $('#PregnancyLactation').val('');
            $('#addGenericModal').modal('show');
        },
        showGenericEditModal: function (genericID, genericName) {
            console.log('Method Name: productObject.showProductEditModal');
            $('.error-message').hide();
            genericObject.activebGenericID = genericID;
            $('#generic_modal').html('Update');
            var formURL = "<?php echo site_url('Generic/getGenericDetail')?>?GenericID="+genericID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'genericObject.showGenericEditModal', function(genericData){
                $('#GenericName').val(genericData.Name);
                $('#Classification').val(genericData.Classification);
                $('#SafetyRemark').val(genericData.SafetyRemark);
                $('#Indication').val(genericData.Indication);
                $('#IndicationTags').val(genericData.IndicationTags);
                $('#DosageAdministration').val(genericData.DosageAdministration);
                $('#ContraindicationPrecaution').val(genericData.ContraindicationPrecaution);
                $('#SideEffect').val(genericData.SideEffect);
                $('#PregnancyLactation').val(genericData.PregnancyLactation);
            });
            $('#addGenericModal').modal('show');
        },
        deleteGeneric: function (genericID) {
            console.log('Method Name: genericObject.deleteGeneric');
            var formURL = "<?php echo site_url('Generic/deleteGeneric');?>?GenericID="+genericID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'genericObject.deleteGeneric', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    genericObject.populateGenericList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitGenericModal: function () {
            var is_valid = genericObject.validateForm();
            if (!is_valid) return;
            $('#addGenericModal').modal('hide');
            var formURL = genericObject.activebGenericID == '' ? "<?php echo site_url('Generic/addGeneric');?>" : "<?php echo site_url('Generic/updateGeneric');?>?GenericID="+genericObject.activebGenericID;
            var postData = $('form#addNewGeneric').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'genericObject.submitGenericModal', function(data){
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showSidePopUp('Error!!!',data.error_msg, false);
                    } else if (data.result){
                        var success_msg = 'You have successfully added a generic.';
                        mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                        genericObject.populateGenericList();
                    }
                }
            });
        },
        populateGenericList: function() {
            var formURL = "<?php echo site_url('Generic/getAllGenericInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'genericObject.getGenericList', function(genericData){
                var generic_tr_text = '';
                $('tbody.generic-list').html('');
                for(var i = 0; i < genericData.length; i++) {
                    generic_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="genericObject.showGenericEditModal('+genericData[i].ID+')">'+genericData[i].Name+'</a></td>' +
                        '<td>'+genericData[i].IndicationTags+'</td>' +
                        '<td>'+genericData[i].Classification+'</td>' +
                        '<td>'+genericData[i].SafetyRemark+'</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="genericObject.showGenericEditModal('+genericData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="genericObject.deleteGeneric('+genericData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.generic-list').append(generic_tr_text);
                }
            });
        }
    }
</script>
