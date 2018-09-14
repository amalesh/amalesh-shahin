<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var advertisementObject = {
        activebAdvertisementID: '',
        allExistingPosition: [],
        initAdvertisementPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
            advertisementObject.getAllAdvertisementPosition();
        },
        getAllAdvertisementPosition: function() {
            console.log('Method Name: advertisementObject.getAllAdvertisementPosition');
            var formURL = "<?php echo site_url('Advertisement/getAllAdvertisementPosition')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'advertisementObject.getAllAdvertisementPosition', function(advertisementPositions){
                for (var i = 0; i < advertisementPositions.length; i++) {
                    advertisementPositions[i].PositionDetail = 'Name: ' + advertisementPositions[i].Name + ', Image Size: ' + advertisementPositions[i].ImageWidth + ' * '+advertisementPositions[i].ImageHeight+', Number of Advertisement: ' + advertisementPositions[i].NumberOfAdvertisement + ', Interval: ' + advertisementPositions[i].Interval + ', Price In BDT: ' + advertisementPositions[i].PriceInBDT;
                    advertisementObject.allExistingPosition[i] = advertisementPositions[i];
                }

                $('#AdvertisementPositionID')
                    .empty()
                    .append('<option selected="selected" value="">Select Advertisement Position</option>');
                $.each(advertisementObject.allExistingPosition, function (i, item) {
                    $('#AdvertisementPositionID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });
            });
        },
        getAdvertisementPositionDetail: function(positionID) {
            var position_detail = '';
            for(var i = 0; i < advertisementObject.allExistingPosition.length; i++) {
                if (positionID == advertisementObject.allExistingPosition[i].ID) {
                    position_detail = advertisementObject.allExistingPosition[i].PositionDetail;
                    break;
                }
            }

            return position_detail;
        },
        changeAdvertisementPosition: function(positionID) {
            if (positionID) {
                var position_detail = advertisementObject.getAdvertisementPositionDetail(positionID);
                if (position_detail != '') {
                    $('#AdvertisementPositionDetail').val(position_detail);
                    $('.advertisement-position-detail').show();
                    $('#AdvertisementPositionID').val(positionID);
                } else {
                    $('#AdvertisementPositionDetail').val('');
                    $('.advertisement-position-detail').hide();
                    $('#AdvertisementPositionID').val('');
                }
            } else {
                $('#AdvertisementPositionDetail').val('');
                $('.advertisement-position-detail').hide();
                $('#AdvertisementPositionID').val('');
            }
        },
        showAdvertisementCreateModal: function () {
            advertisementObject.activebAdvertisementID = '';
            $('#advertisement_modal').html('Create');
            $('#AdvertisementOrganization').val('');
            $('#AdvertisementPositionID').val('');
            $('#AdvertisementPositionDetail').val('');
            $('#AdvertisementImagePath').val('');
            $('#AdvertisementImagePathThumbnail').attr('src', '');
            $('#AdvertisementTitle').val('');
            $('#AdvertisementBodyText').val('');
            $('#AdvertisementLinkURL').val('');
            $('#AdvertisementPublishDate').val('');
            $('#AdvertisementUnpublishedDate').val('');
            $('#AdvertisementContactPerson').val('');
            $('#AdvertisementEmailID').val('');
            $('#AdvertisementMobileNo').val('');
            $("#AdvertisementIsActiveNo").prop("checked", true);
            advertisementObject.changeAdvertisementPosition('');
            $('#addAdvertisementModal').modal('show');
        },
        showAdvertisementEditModal: function (advertisementID, advertisementName) {
            advertisementObject.activebAdvertisementID = advertisementID;
            $('#advertisement_modal').html('Update');
            $('#AdvertisementName').val(advertisementName);
            $('#addAdvertisementModal').modal('show');
        },
        deleteAdvertisement: function (advertisementID) {
            console.log('Method Name: advertisementObject.deleteAdvertisement');
            var formURL = "<?php echo site_url('Advertisement/deleteAdvertisement');?>?AdvertisementID="+advertisementID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'advertisementObject.deleteAdvertisement', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    advertisementObject.populateAdvertisementList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitAdvertisementModal: function () {
            $('#addAdvertisementModal').modal('hide');
            var formURL = advertisementObject.activebAdvertisementID == '' ? "<?php echo site_url('Advertisement/addAdvertisement');?>" : "<?php echo site_url('Advertisement/updateAdvertisement');?>?AdvertisementID="+advertisementObject.activebAdvertisementID;
            var form = $('form#addNewAdvertisement');
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
                            var success_msg = 'You have successfully added a advertisement.';
                            mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                            advertisementObject.populateAdvertisementList();
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
        populateAdvertisementList: function() {
            var formURL = "<?php echo site_url('Advertisement/getAllAdvertisementInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'advertisementObject.getAdvertisementList', function(advertisementData){
                var advertisement_tr_text = '';
                $('tbody.advertisement-list').html('');
                for(var i = 0; i < advertisementData.length; i++) {
                    advertisement_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="advertisementObject.showAdvertisementEditModal('+advertisementData[i].ID+')">'+advertisementData[i].Organization+'</a></td>' +
                        '<td>' + advertisementData[i].Title + '</td>' +
                        '<td>' + advertisementData[i].PublishDate + '</td>' +
                        '<td>' + advertisementData[i].UnpublishedDate + '</td>' +
                        '<td>' + advertisementData[i].PositionName + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="advertisementObject.showAdvertisementEditModal('+advertisementData[i].ID+',\''+advertisementData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="advertisementObject.deleteAdvertisement('+advertisementData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.advertisement-list').append(advertisement_tr_text);
                }
            });
        },
        showAdvertisementEditModal: function (advertisementID) {
            console.log('Method Name: advertisementObject.showAdvertisementEditModal');
            advertisementObject.activebAdvertisementID = advertisementID;
            var formURL = "<?php echo site_url('Advertisement/getAdvertisementDetailInformation')?>?AdvertisementID="+advertisementID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'advertisementObject.showAdvertisementEditModal', function(advertisementData){
                $('#AdvertisementOrganization').val(advertisementData.Organization);
                $('#AdvertisementPositionID').val(advertisementData.AdvertisementPositionID);
                $('#AdvertisementImagePath').val('');
                $('#AdvertisementImagePathThumbnail').attr('src', '<?php echo base_url()?>AdvertisementImages/'+advertisementData.ImagePath);
                $('#AdvertisementTitle').val(advertisementData.Title);
                $('#AdvertisementBodyText').val(advertisementData.BodyText);
                $('#AdvertisementLinkURL').val(advertisementData.LinkURL);
                $('#AdvertisementPublishDate').datepicker('setValue', advertisementData.PublishDate);
                $('#AdvertisementUnpublishedDate').datepicker('setValue', advertisementData.UnpublishedDate);
                $('#AdvertisementContactPerson').val(advertisementData.ContactPerson);
                $('#AdvertisementEmailID').val(advertisementData.EmailID);
                $('#AdvertisementMobileNo').val(advertisementData.MobileNo);
                advertisementObject.changeAdvertisementPosition(advertisementData.AdvertisementPositionID);
                if (advertisementData.IsActive) {
                    $("#AdvertisementIsActiveYes").prop("checked", true);
                } else {
                    $("#AdvertisementIsActiveNo").prop("checked", true);
                }
            });
            $('#advertisement_modal').html('Update');
            $('#addAdvertisementModal').modal('show');
        },
        setAdvertisementImagePathThumbnail: function (input, objectID) {
            console.log('advertisementObject.setAdvertisementImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#AdvertisementImagePathThumbnail').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    advertisementObject.initAdvertisementPage();
</script>
