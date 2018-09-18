<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var drugObject = {
        searchOptionType: '',
        searchOptionValue: '',
        perPageInformationNumber: '',
        searchOptionForBrand: [],
        searchOptionForGeneric: [],
        searchOptionForIndication: [],
        searchOptionForManufacturer: [],
        totalDrug: 0,
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('Brand/getSearchResult?Type=')?>"+drugObject.searchOptionType+'&Value='+drugObject.searchOptionValue+'&PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                if (drugData) {
                    switch (drugObject.searchOptionType) {
                        case 'brand':
                            break;
                        case 'brand_by_alphabetically':
                            break;
                        case 'generic':
                            $('tbody.generic-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.generic-list').append('<tr>');
                                $('tbody.generic-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=');?>'+drugData[i].Name+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.generic-list').append('<td>'+drugData[i].ManufacturerName+'</td>');
                                $('tbody.generic-list').append('</tr>');
                            }
                            break;
                        case 'generic_by_alphabetically':
                            break;
                        case 'indication':
                            break;
                        case 'manufacturer':
                            break;
                        default:
                            break;
                    }
                }
            });
        },
        searchBrandInformation: function() {
            console.log('Method Name: drugObject.searchBrandInformation Param:  Value: ');
            var search_option = $('#searchDrugOption').val();
            drugObject.searchOptionValue = search_option;
            if (search_option == '') return false;
            var formURL = "<?php echo site_url('Brand/searchBrandInformation?Type=')?>"+drugObject.searchOptionType+'&Value='+drugObject.searchOptionValue;
            switch (drugObject.searchOptionType) {
                case 'brand':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForBrand) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                case 'generic':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForGeneric) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                case 'indication':
                    break;
                case 'manufacturer':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForManufacturer) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                default:
                    break;
            }

            $('.invalid-search-option-error').hide();
            window.location.replace(formURL);
        },
        getNewProducts: function(allProduct) {
            console.log('Method Name: drugObject.getNewProducts Param: allProduct Value: '+[allProduct].toString());
            var formURL = "<?php echo site_url('Brand/getNewProducts?AllProduct=')?>"+allProduct;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                $('div.new-products-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = <?php echo config_item("home_page_new_item_limit");?>;
                    for (var i = 0; i < home_page_new_item_limit / 2; i++) {
                        if (i == drugData.length) break;
                        $('div.new-products-ul ul.float-left').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }

                    for (var i = home_page_new_item_limit / 2; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        $('div.new-products-ul ul.float-right').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }
                }
            });
        },
        getNewPresentations: function(allPresentation) {
            console.log('Method Name: drugObject.getNewPresentations Param: allPresentation Value: '+[allPresentation].toString());
            var formURL = "<?php echo site_url('Brand/getNewPresentations?AllPresentation=')?>"+allPresentation;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getNewPresentations', function(drugData){
                console.dir(drugData);
                $('div.new-presentation-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = <?php echo config_item("home_page_new_item_limit");?>;
                    for (var i = 0; i < home_page_new_item_limit / 2; i++) {
                        if (i == drugData.length) break;
                        $('div.new-presentation-ul ul.float-left').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }

                    for (var i = home_page_new_item_limit / 2; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        $('div.new-presentation-ul ul.float-right').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }
                }
            });
        },
        getNewBrands: function(allBrand) {
            console.log('Method Name: drugObject.getNewBrands Param: allBrand Value: '+[allBrand].toString());
            var formURL = "<?php echo site_url('Brand/getNewBrands?AllBrand=')?>"+allBrand;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getNewBrands', function(drugData){
                $('div.new-brand-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = <?php echo config_item("home_page_new_item_limit");?>;
                    for (var i = 0; i < home_page_new_item_limit / 2; i++) {
                        if (i == drugData.length) break;
                        $('div.new-brand-ul ul.float-left').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }

                    for (var i = home_page_new_item_limit / 2; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        $('div.new-brand-ul ul.float-right').append('<li><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></li>');
                    }
                }
            });
        },
        getHighlightedBrands: function() {
            console.log('Method Name: drugObject.getHighlightedBrands Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('Brand/getHighlightedBrands')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                if(drugData) {
                    $('.product-highlights').html('<h3 class="title">PRODUCT HIGHLIGHTS</h3>' +
                        '<img src="<?php echo base_url()?>BrandImages/'+drugData.ImagePath+'" alt="product" class="img-fluid" style="padding: 79px 0;">' +
                        '                            <div class="product-detail">' +
                        '                                <h4 class="title">PRODUCT</h4>' +
                        '                                <p class="info" style="color: #4C99D3;font-size: 20px;margin-bottom: 70px;"><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>'+drugData.ID+'">'+drugData.Name+'</a></p>' +
                        '                                <h4 class="title">CONTENT</h4>' +
                        '                                <p class="info">('+drugData.StrengthName+')</p>' +
                        '                                <h4 class="title">INDICATIONS</h4>' +
                        '                                <p class="info">'+drugData.Indication+'</p>' +
                        '                            </div>');
                }
            });
        },
        changeSearchOption: function(searchOption) {
            console.log('Method Name: drugObject.changeSearchOption Param:  Value: '+[].toString());
            drugObject.searchOptionType = searchOption;
            var search_options = [];
            $('.search_option_type').css('color', '#1996C0');
            $('.search_by_'+searchOption).css('color', 'blue');
            switch (searchOption) {
                case 'brand':
                    search_options = drugObject.searchOptionForBrand;
                    break;
                case 'generic':
                    search_options = drugObject.searchOptionForGeneric;
                    break;
                case 'indication':
                    search_options = drugObject.searchOptionForIndication;
                    break;
                case 'manufacturer':
                    search_options = drugObject.searchOptionForManufacturer;
                    break;
                default:
                    break;
            }
            $('#searchDrugOption').autocomplete({
                source: search_options
            });
        },
        getDrugList: function(getDrugList) {
            console.log('Method Name: drugObject.getDrugList Param: getDrugList Value: '+[getDrugList].toString());
            var formURL = "<?php echo site_url('Brand/getAllDrugInformation')?>"+'?PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getDrugList', function(drugData){
                var drug_td_text = '';
                for(var i = 0; i < drugData.length; i++) {
                    drug_td_text = '<tr>' +
                        '<td><a href="<?php echo site_url('Brand/showBrandDetail')?>'+'?BrandID='+drugData[i].ID+'">'+drugData[i].Name+'</a></td>' +
                        '<td>'+drugData[i].DosageForm+'</td>' +
                        '<td>'+drugData[i].StrengthName+'</td>' +
                        '<td>'+drugData[i].PackSize+'</td>' +
                        '<td>'+drugData[i].PriceInBDT+' Tk</td>' +
                        '</tr>';
                    $('tbody.drug-list').append(drug_td_text);
                }
            });
            drugObject.populatePagination(pageNo);
        },
        getAllDrugInfoForAutoComplete: function() {
            console.log('Method Name: drugObject.getAllDrugInfoForAutoComplete Param: option Value: ');
            var formURL = "<?php echo site_url('Brand/getAllDrugInfoForAutoComplete')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getAllDrugInfoForAutoComplete', function(drugData){
                drugObject.searchOptionForBrand = drugData.Brand;
                drugObject.searchOptionForGeneric = drugData.Generic;
                drugObject.searchOptionForIndication = drugData.Indication;
                drugObject.searchOptionForManufacturer = drugData.Manufacturer;
                drugObject.changeSearchOption('brand');
            });
        },
        populatePagination: function (objectID, pageNo, populateList) {
            console.log('Method Name: drugObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = drugObject.perPageInformationNumber;
            var total_page = Math.ceil(drugObject.totalDrug / per_page_information_number);
            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#'+objectID).html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#'+objectID).html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="drugObject.populatePagination(\''+objectID+'\','+previous_page_no+', true)">' +
                    '                                        <span>&laquo;</span>' +
                    '                                        <span class="sr-only">Previous</span>' +
                    '                                    </a>' +
                    '                                </li>' +
                    '                                ');
            }
            
            for(var i = start_page_no; ; i++) {
                if (page_counter == total_pagination - 1 || page_counter == total_page) {
                    break;
                }
                pagination_li_text = '';
                if (i == pageNo) {
                    pagination_li_text = '<li class="page-item active"><a class="page-link" href="#">'+i+'</a></li>';
                } else {
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="drugObject.populatePagination(\''+objectID+'\','+i+', true)">'+i+'</a></li>';
                }
                $('ul#'+objectID).append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#'+objectID).append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="drugObject.populatePagination(\''+objectID+'\','+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }

            if (populateList === true) drugObject.getSearchResult(pageNo);
        }
    }

    $(document).bind('keydown', function(e){
        if (e.which == 13){
            $('#searchInformation').trigger('click');
        }
    });
</script>