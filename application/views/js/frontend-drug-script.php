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
        searchManufacturerBrandOption: '',
        totalDrug: 0,
        getJobCirculars: function() {
            console.log('Method Name: drugObject.getJobCirculars Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('Job/getJobInformationForHomePage')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getJobCirculars', function(jobData) {
                if (jobData) {
                    var individual_job = '';
                    for (var job_no = 0; job_no < jobData.length; job_no++) {
                        var logo_path = jobData[job_no].OrganizationLogo == '' || jobData[job_no].OrganizationLogo == null ? '' : '<?php echo base_url();?>'+'JobImages/'+jobData[job_no].OrganizationLogo;
                        individual_job = '<div class="row job">' +
                        '<div class="col-2">' +
                        '<img class="job-img" src="'+logo_path+'" alt="">'+
                        '</div>'+
                        '<div class="col-10">'+
                        '<p class="job-title"><a href="<?php echo site_url('Job/showJobDetail?JobID=')?>'+jobData[job_no].ID+'">'+jobData[job_no].Title+'</a></p>'+
                        '<p class="job-company">'+jobData[job_no].Organization+'</p>'+
                        '</div>'+
                        '<img class="right-arrow" src="<?php echo base_url().'application/views/';?>images/icons/right-arrow.svg" alt=">">'+
                        '</div>';

                        $('.home-job-circular-list').append(individual_job);
                    }
                }
            });
        },
        getLocalNews: function() {
            console.log('Method Name: drugObject.getLocalNews Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('News/getLocalNewsForHomePage')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getLocalNews', function(newsData) {
                if (newsData) {
                    var individual_news = '';
                    for (var news_no = 0; news_no < newsData.length; news_no++) {
                        var news_description = newsData[news_no].Description;
                        news_description = news_description.length > 100 ? news_description.substr(0, 100) + '...' : news_description;
                        individual_news = '<div class="row news home-news">' +
                        '<div class="col-4">' +
                        '<img class="news-img" src="<?php echo base_url();?>NewsImages/'+newsData[news_no].ImagePath+'" alt="">'+
                        '</div>'+
                        '<div class="col-8">'+
                        '<p class="news-title"><a href="<?php echo site_url('News/showIndividualNewsDetail?NewsID=')?>'+newsData[news_no].ID+'">'+newsData[news_no].Title+'</a></p>'+
                        '<p class="news-description d-md-block d-none">'+news_description+'</p>'+
                        '</div>'+
                        '</div>';

                        $('.home-local-news-list').append(individual_news);
                    }
                }
            });
        },
        getSpecialReports: function() {
            console.log('Method Name: drugObject.getSpecialReports Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('SpecialReports/getSpecialReportsForHomePage')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getSpecialReports', function(specialReportData) {
                if (specialReportData) {
                    var individual_special_report = '';
                    for (var special_report_no = 0; special_report_no < specialReportData.length; special_report_no++) {
                        individual_special_report = '<div class="home-special-report-slide">' +
                        '<img src="<?php echo base_url();?>SpecialReportImages/'+specialReportData[special_report_no].ImagePath+'" alt="">'+
                        '<p class="home-special-report-slide-title"><a href="'+specialReportData[special_report_no].LinkAddress+'" target="_blank">'+specialReportData[special_report_no].Title+'</p>'+
                        '</div>';

                        $('.home-special-report-list').append(individual_special_report);
                    }

                    $('#home-special-report-slider').slick({
                        slidesToScroll: 1,
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 1000,
                        infinite: false,
                        arrows: true,
                        responsive: [
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2,
                                    arrows: false,
                                }
                            }
                        ]
                    });
                }
            });
        },
        getImportantAddress: function() {
            console.log('Method Name: drugObject.getImportantAddress Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('Address/getImportantAddressForHomePage')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getImportantAddress', function(addressData) {
                if (addressData) {
                    var individual_address = '';
                    for (var address_no = 0; address_no < addressData.length; address_no++) {
                        individual_address = '<li class="address"><a href="<?php echo site_url('Address/getAllImportantAddress?AddressCategoryID=')?>'+addressData[address_no].ID+'">'+addressData[address_no].Name+'</a></li>';
                        $('ul.home-address-list').append(individual_address);
                    }

                    if (addressData.length) {
                        $('ul.home-address-list').append('<a href="<?php echo site_url('Address/getAllImportantAddress')?>" class="see-more-btn no-outline">See All Addresses</a>');
                    }
                }
            });
        },
        getResources: function() {
            console.log('Method Name: drugObject.getResources Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('Resource/getAllActiveResource')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getResources', function(resourceData) {
                if (resourceData) {
                    var individual_resource = '';
                    for (var resource_no = 0; resource_no < resourceData.length; resource_no++) {
                        individual_resource = '<li class="resource-item"><a target="_blank" href="<?php echo site_url('Resource/getResourceDetail?ResourceID=')?>'+resourceData[resource_no].ID+'">'+resourceData[resource_no].Title+'</a></li>';
                        $('ul.resource-item-list').append(individual_resource);
                    }

                    if (resourceData.length) {
                        $('ul.resource-item-list').append('<a href="<?php echo site_url('Resource/getAllActiveResourceInformation')?>" class="see-more-btn no-outline">See All Addresses</a>');
                    }
                }
            });
        },
        getManufacturerBrand: function(searchOption){
            $('li.search-manufacturer-option').removeClass('active');
            $('li.search-manufacturer-option-'+searchOption).addClass('active');
            drugObject.searchManufacturerBrandOption = searchOption;
            drugObject.searchOptionType = 'manufacturer';
            var formURL = "<?php echo site_url('Brand/getTotalManufacturerBrand?Manufacturer=')?>"+drugObject.searchOptionValue+'&ManufacturerBrandOption='+drugObject.searchManufacturerBrandOption;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                drugObject.totalDrug = drugData;
                drugObject.getSearchResult(1);
                drugObject.populatePagination(1);
            });
        },
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('Brand/getSearchResult?Type=')?>"+drugObject.searchOptionType+'&Value='+drugObject.searchOptionValue+'&PageNo='+pageNo+'&ManufacturerBrandOption='+drugObject.searchManufacturerBrandOption;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                if (drugData) {
                    switch (drugObject.searchOptionType) {
                        case 'brand':
                        case 'brand_by_alphabetically':
                            $('tbody.drug-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.drug-list').append('<tr>');
                                $('tbody.drug-list').append('<td><a href="<?php echo site_url('Brand/showBrandDetail?BrandID=');?>'+drugData[i].ID+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].DosageForm+'</td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].StrengthName+'</td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].PackSize+'</td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].PriceInBDT+' Tk</td>');
                                $('tbody.drug-list').append('</tr>');
                            }
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
                            $('tbody.generic-alphabetically-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.generic-alphabetically-list').append('<tr>');
                                $('tbody.generic-alphabetically-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=');?>'+drugData[i].Name+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.generic-alphabetically-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&Value=');?>'+drugData[i].GenericName+'">'+drugData[i].GenericName+'</a></td>');
                                $('tbody.generic-alphabetically-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=manufacturer&Value=');?>'+drugData[i].ManufacturerName+'">'+drugData[i].ManufacturerName+'</a></td>');
                                $('tbody.generic-alphabetically-list').append('</tr>');
                            }
                            break;
                        case 'indication':
                            $('tbody.indication-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.indication-list').append('<tr>');
                                $('tbody.indication-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=');?>'+drugData[i].Name+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.indication-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&Value=');?>'+drugData[i].GenericName+'">'+drugData[i].GenericName+'</a></td>');
                                $('tbody.indication-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=manufacturer&Value=');?>'+drugData[i].ManufacturerName+'">'+drugData[i].ManufacturerName+'</a></td>');
                                $('tbody.indication-list').append('</tr>');
                            }
                            break;
                        case 'manufacturer':
                            $('tbody.manufacturer-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.manufacturer-list').append('<tr>');
                                $('tbody.manufacturer-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=');?>'+drugData[i].Name+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.manufacturer-list').append('<td><a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&Value=');?>'+drugData[i].GenericName+'">'+drugData[i].GenericName+'</a></td>');
                                $('tbody.manufacturer-list').append('</tr>');
                            }
                            break;
                        default:
                            break;
                    }
                } else {
                    switch (drugObject.searchOptionType) {
                        case 'brand':
                        case 'brand_by_alphabetically':
                            $('tbody.drug-list').html('');
                            break;
                        case 'generic':
                            $('tbody.generic-list').html('');
                            break;
                        case 'generic_by_alphabetically':
                            $('tbody.generic-alphabetically-list').html('');
                            break;
                        case 'indication':
                            $('tbody.indication-list').html('');
                            break;
                        case 'manufacturer':
                            $('tbody.manufacturer-list').html('');
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
            console.log('Search By:'+search_option+'Word');
            search_option = $.trim(search_option);
            console.log('Search By:'+search_option+'Word After trim');
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
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForIndication) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
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
                        if (i == 0) $('div.new-product-information').html('<h4>New Products</h4>');
                        $('div.new-product-information').append('<a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=')?>'+drugData[i].Name+'">'+drugData[i].Name+'</a>');
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
                    for (var i = 0; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        if (i == 0) $('div.new-presentation-information').html('<h4>New Presentations</h4>');
                        $('div.new-presentation-information').append('<a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=')?>'+drugData[i].Name+'">'+drugData[i].Name+'</a>');
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
                    for (var i = 0; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        if (i == 0) $('div.new-brand-information').html('<h4>New Brands</h4>');
                        $('div.new-brand-information').append('<a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value=')?>'+drugData[i].Name+'">'+drugData[i].Name+'</a>');
                    }
                }
            });
        },
        getHighlightedBrands: function() {
            console.log('Method Name: drugObject.getHighlightedBrands Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('Brand/getHighlightedBrands')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                if(drugData.ImagePath != undefined) {
                    var indication = drugData.Indication;
                    indication = indication.length > 70 ? indication.substr(0, 67) + '...' : indication;
                    $('#highlighted-product').html('<div class="star-product-img">' +
                    '<img src="<?php echo base_url()?>BrandImages/' + drugData.ImagePath + '" alt="">' +
                    '</div>' +
                    '<div class="star-product-info">' +
                    '<div class="star"><i class="fas fa-star"></i></div>' +
                    '<a href="<?php echo site_url('Brand/showBrandDetail?BrandID=')?>' + drugData.ID + '" class="star-product-name">' + drugData.Name + '</a>' +
                    '<p class="star-product-attributes">(' + drugData.StrengthName + ')</p>' +
                    '<p class="star-product-description">' + indication + '</p>' +
                    '</div>');
                }
            });
        },
        changeSearchOption: function(searchOption) {
            console.log('Method Name: drugObject.changeSearchOption Param: searchOption  Value: '+[searchOption].toString());
            drugObject.searchOptionType = searchOption;
            var search_options = [];
            $('.search_option_type').css('color', '#1996C0');
            $('.search_by_'+searchOption).css('color', 'red');
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
                source: function(request, response) {
                    var results = $.ui.autocomplete.filter(search_options, request.term);
                    response(results.slice(0, 10));
                }
            });
        },
        searchAlphabetically: function(value) {
            if(drugObject.searchOptionType == 'manufacturer') {
                drugObject.getManufacturerBrand(value);
            } else {
                var type = 'brand_by_alphabetically';
                switch (drugObject.searchOptionType) {
                    case 'brand':
                        type = 'brand_by_alphabetically';
                        break;
                    case 'generic':
                        type = 'generic_by_alphabetically';
                        break;
                    default:
                        break;
                }

                window.location.replace('<?php echo site_url('Brand/searchBrandInformation?Type=');?>'+type+'&Value='+value);
            }
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
        getAllDrugInfoForAutoComplete: function(searchOption) {
            console.log('Method Name: drugObject.getAllDrugInfoForAutoComplete Param: option Value: ');
            var formURL = "<?php echo site_url('Brand/getAllDrugInfoForAutoComplete')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getAllDrugInfoForAutoComplete', function(drugData){
                drugObject.searchOptionForBrand = drugData.Brand;
                drugObject.searchOptionForGeneric = drugData.Generic;
                drugObject.searchOptionForIndication = drugData.Indication;
                drugObject.searchOptionForManufacturer = drugData.Manufacturer;

                drugObject.changeSearchOption(searchOption);
            });
        },
        populatePagination: function (objectID, pageNo, populateList) {
            console.log('Method Name: drugObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = drugObject.perPageInformationNumber;
            var total_page = Math.ceil(drugObject.totalDrug / per_page_information_number);

            if (populateList === true) drugObject.getSearchResult(pageNo);
            if (total_page == 1) $('ul#'+objectID).hide();

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
        }
    }

    $(document).bind('keydown', function(e){
        if (e.which == 13){
            $('#searchInformation').trigger('click');
        }
    });
</script>