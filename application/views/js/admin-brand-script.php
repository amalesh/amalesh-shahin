<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var brandObject = {
        activeBrandID: '',
        allGenericInfo: [],
        allManufacturerInfo: [],
        allDosageFormInfo: [],
        allStrengthInfo: [],
        allPackSizeInfo: [],
        initBrandPage: function() {
            brandObject.activeBrandID = '';
            var formURL = "<?php echo site_url('Brand/getAllGeneralInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'brandObject.initBrandPage', function(generalData){
                console.dir(generalData);
                brandObject.allGenericInfo = generalData.GenericInfo;
                brandObject.allManufacturerInfo = generalData.ManufacturerInfo;
                brandObject.allDosageFormInfo = generalData.DosageFormInfo;
                brandObject.allStrengthInfo = generalData.StrengthInfo;
                brandObject.allPackSizeInfo = generalData.PackSizeInfo;

                $('#GenericID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(brandObject.allGenericInfo, function (i, item) {
                    $('#GenericID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#ManufacturerID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(brandObject.allManufacturerInfo, function (i, item) {
                    $('#ManufacturerID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#DosageFormID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(brandObject.allDosageFormInfo, function (i, item) {
                    $('#DosageFormID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#StrengthID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(brandObject.allStrengthInfo, function (i, item) {
                    $('#StrengthID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#PackSizeID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(brandObject.allPackSizeInfo, function (i, item) {
                    $('#PackSizeID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });
            });
        },
        showBrandCreateModal: function () {
            brandObject.activeBrandID = '';
            $('#brand_modal').html('Create');
            $('#BrandName').val('');
            $('#GenericID').val('');
            $('#ManufacturerID').val('');
            $('#DosageFormID').val('');
            $('#StrengthID').val('');
            $('#PackSizeID').val('');
            $('#PriceInBDT').val('');
            $('#BrandImagePathThumbnail').attr('src', '');
            $("#IsHighlightedNo").prop("checked", true);
            $("#IsFeatureBrandNo").prop("checked", true);
            $("#BrandIsActiveNo").prop("checked", true);
            $('#addBrandModal').modal('show');
        },
        showBrandEditModal: function (brandID) {
            console.log('Method Name: brandObject.showBrandEditModal');
            brandObject.activeBrandID = brandID;
            var formURL = "<?php echo site_url('Brand/getBrandDetail')?>?BrandID="+brandID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'brandObject.showBrandEditModal', function(brandData){
                $('#BrandName').val(brandData.Name);
                $('#GenericID').val(brandData.GenericID);
                $('#ManufacturerID').val(brandData.ManufacturerID);
                $('#DosageFormID').val(brandData.DosageFormID);
                $('#StrengthID').val(brandData.StrengthID);
                $('#PackSizeID').val(brandData.PackSizeID);
                $('#BrandImagePathThumbnail').attr('src', '<?php echo base_url();?>BrandImages/'+brandData.ImagePath);
                $('#PriceInBDT').val(brandData.PriceInBDT);
                if (brandData.IsHighlighted == 1) {
                    $("#IsHighlightedYes").prop("checked", true);
                } else {
                    $("#IsHighlightedNo").prop("checked", true);
                }

                if (brandData.IsFeatureBrand == 1) {
                    $("#IsFeatureBrandYes").prop("checked", true);
                } else {
                    $("#IsFeatureBrandNo").prop("checked", true);
                }

                if (brandData.IsActive == 1) {
                    $("#BrandIsActiveYes").prop("checked", true);
                } else {
                    $("#BrandIsActiveNo").prop("checked", true);
                }
            });
            $('#brand_modal').html('Update');
            $('#addBrandModal').modal('show');
        },
        deleteBrand: function (brandID) {
            console.log('Method Name: brandObject.deleteBrand');
            var formURL = "<?php echo site_url('Brand/deleteBrand');?>?BrandID="+brandID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'brandObject.deleteBrand', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                    brandObject.populateBrandList();
                } else {
                    mimsPopup.showSidePopUp('Error!!!','Data is not deleted successfully!', false);
                }
            });
        },
        submitBrandModal: function () {
            $('#addBrandModal').modal('hide');
            var formURL = brandObject.activeBrandID == '' ? "<?php echo site_url('Brand/addBrand');?>" : "<?php echo site_url('Brand/updateBrand');?>?BrandID="+brandObject.activeBrandID;
            var form = $('form#addNewBrand');
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
                            var success_msg = 'You have successfully added a brand.';
                            mimsPopup.showSidePopUp('Success!!!', success_msg, true);
                            brandObject.populateBrandList();
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
        populateBrandList: function() {
            var formURL = "<?php echo site_url('Brand/getAllBrandInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'brandObject.getBrandList', function(brandData){
                var brand_tr_text = '';
                $('tbody.brand-list').html('');
                for(var i = 0; i < brandData.length; i++) {
                    brand_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="brandObject.showBrandEditModal('+brandData[i].BrandID+')">'+brandData[i].Name+'</a></td>' +
                        '<td>'+brandData[i].GenericName+'</td>' +
                        '<td>'+brandData[i].PriceInBDT+' Tk</td>' +
                        '<td>'+brandData[i].ManufacturerName+'</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="brandObject.showBrandEditModal('+brandData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="brandObject.deleteBrand('+brandData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.brand-list').append(brand_tr_text);
                }
            });
        },
        setBrandImagePathThumbnail: function (input, objectID) {
            console.log('brandObject.setBrandImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#BrandImagePathThumbnail').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    brandObject.initBrandPage();
</script>
