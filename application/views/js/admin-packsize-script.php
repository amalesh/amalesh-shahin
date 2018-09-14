<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var packSizeObject = {
        activebPackSizeID: '',
        showPackSizeCreateModal: function () {
            packSizeObject.activebPackSizeID = '';
            $('#packsize_modal').html('Create');
            $('#PackSizeName').val('');
            $('#addPackSizeModal').modal('show');
        },
        showPackSizeEditModal: function (packsizeID, packsizeName) {
            packSizeObject.activebPackSizeID = packsizeID;
            $('#packsize_modal').html('Update');
            $('#PackSizeName').val(packsizeName);
            $('#addPackSizeModal').modal('show');
        },
        deletePackSize: function (packSizeID) {
            console.log('Method Name: packSizeObject.deletePackSize');
            var formURL = "<?php echo site_url('PackSize/deletePackSize');?>?PackSizeID="+packSizeID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'packSizeObject.deletePackSize', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    packSizeObject.populatePackSizeList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitPackSizeModal: function () {
            $('#addPackSizeModal').modal('hide');
            var formURL = packSizeObject.activebPackSizeID == '' ? "<?php echo site_url('PackSize/addPackSize');?>" : "<?php echo site_url('PackSize/updatePackSize');?>?PackSizeID="+packSizeObject.activebPackSizeID;
            var postData = $('form#addNewPackSize').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'packSizeObject.submitPackSizeModal', function(data){
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showSidePopUp('Error!!!',data.error_msg, false);
                    } else if (data.result){
                        var success_msg = 'You have successfully added a pack size.';
                        mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                        packSizeObject.populatePackSizeList();
                    }
                }
            });
        },
        populatePackSizeList: function() {
            var formURL = "<?php echo site_url('PackSize/getAllActivePackSizeInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'packSizeObject.getPackSizeList', function(packsizeData){
                var packsize_tr_text = '';
                $('tbody.packsize-list').html('');
                for(var i = 0; i < packsizeData.length; i++) {
                    packsize_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="packSizeObject.showPackSizeEditModal('+packsizeData[i].ID+')">'+packsizeData[i].Name+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="packSizeObject.showPackSizeEditModal('+packsizeData[i].ID+',\''+packsizeData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="packSizeObject.deletePackSize('+packsizeData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.packsize-list').append(packsize_tr_text);
                }
            });
        }
    }
</script>
