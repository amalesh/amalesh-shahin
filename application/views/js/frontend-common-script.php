<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var frontendCommonMethods = {
        totalDrug: 0,
        activeBrandAlphabet: '',
        activeGenericAlphabet: '',
        getSideBarData: function () {
            console.log('Method Name: frontendCommonMethods.getSideBarData Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('CommonMethods/getSideBarInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getSideBarData', function(sideBarData){
                if (sideBarData) {
                    console.dir(sideBarData);
                    var all_jobs = sideBarData.AllJobs;
                    var all_address = sideBarData.AllAddress;
                    var all_news = sideBarData.AllNews;
                    var all_special_reports = sideBarData.AllSpecialReports;

                    $('ul.sidebar-jobs').html('');
                    $('ul.sidebar-news').html('');
                    $('ul.sidebar-address').html('');
                    $('div.speacial-reports').html('<h3 class="title">Special Reports</h3>');

                    for(var i = 0; i < all_jobs.length; i++) {
                        $('ul.sidebar-jobs').append('<li><a href="<?php echo site_url('Job/showIndividualJobDetail?JobID=')?>'+all_jobs[i].ID+'">'+all_jobs[i].Title+'</a></li>');
                    }

                    for(var i = 0; i < all_address.length; i++) {
                        $('ul.sidebar-assress').append('<li><a href="<?php echo site_url('Address/showIndividualAddressDetail?AddressID=')?>'+all_address[i].ID+'">'+all_address[i].Name+'</a></li>');
                    }

                    for(var i = 0; i < all_news.length; i++) {
                        $('ul.sidebar-news').append('<li><a href="<?php echo site_url('News/showIndividualNewsDetail?NewsID=')?>'+all_news[i].ID+'">'+all_news[i].Title+'</a></li>');
                    }

                    for(var i = 0; i < all_special_reports.length; i++) {
                        $('div.speacial-reports').append('<div class="media">' +
                            '<img class="mr-3" src="<?php echo base_url();?>SpecialReportImages/'+all_special_reports[i].ImagePath+'" alt="image">'+
                            '<div class="media-body">'+
                            '<h5 class="mt-0"><a href="<?php echo base_url();?>SpecialReportImages/'+all_special_reports[i].LinkAddress+'">'+all_special_reports[i].Title+'</a></h5>'+
                            '</div>'+
                        '</div>');
                    }
                }
            });
        },
        searchBrandAlphabetically: function (alphabet, pageNo) {
            console.log('Method Name: frontendCommonMethods.searchBrandAlphabetically Param: allProduct Value: '+[alphabet, pageNo].toString());
            frontendCommonMethods.activeBrandAlphabet = alphabet;
            var formURL = "<?php echo site_url('Product/searchBrandAlphabetically')?>"+'?Alphabet='+alphabet+'&PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.searchBrandAlphabetically', function(brandData){
                if (brandData) {
                    var drug_td_text = '';
                    for(var i = 0; i < brandData.length; i++) {
                        drug_td_text = '<tr>' +
                            '<td><a href="<?php echo site_url('Product/showDrugDetail')?>'+'?DrugID='+brandData[i].DrugID+'">'+brandData[i].BrandName+'</a></td>' +
                            '<td><a href="<?php echo site_url('Manufacturer/getManufacturerDetail')?>'+'?ManufacturerID='+brandData[i].ManufacturerID+'">'+brandData[i].ManufacturerName+'</a></td>' +
                            '</tr>';
                        $('tbody.drug-list').append(drug_td_text);
                    }
                }
            });
            frontendCommonMethods.populatePagination('brand', pageNo);
        },
        searchGenericAlphabetically: function (alphabet, pageNo) {
            console.log('Method Name: frontendCommonMethods.searchGenericAlphabetically Param: allProduct Value: '+[alphabet, pageNo].toString());
            frontendCommonMethods.activeGenericAlphabet = alphabet;
            var formURL = "<?php echo site_url('Product/searchGenericAlphabetically')?>"+'?Alphabet='+alphabet+'&PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.searchGenericAlphabetically', function(brandData){
                if (brandData) {
                    var drug_td_text = '';
                    for(var i = 0; i < brandData.length; i++) {
                        drug_td_text = '<tr>' +
                            '<td><a href="<?php echo site_url('Product/showDrugDetail')?>'+'?DrugID='+brandData[i].DrugID+'">'+brandData[i].BrandName+'</a></td>' +
                            '<td><a href="<?php echo site_url('Manufacturer/getManufacturerDetail')?>'+'?ManufacturerID='+brandData[i].ManufacturerID+'">'+brandData[i].ManufacturerName+'</a></td>' +
                            '</tr>';
                        $('tbody.drug-list').append(drug_td_text);
                    }
                }
            });
            frontendCommonMethods.populatePagination('generic', pageNo);
        },
        populatePagination: function (searchBy, pageNo) {
            console.log('Method Name: frontendCommonMethods.populatePagination Param: searchBy, pageNo Value: '+[searchBy, pageNo].toString());
            var per_page_information_number = <?php echo config_item('per_page_information_number');?>;
            var total_page = Math.ceil(frontendCommonMethods.totalDrug / per_page_information_number);
            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text = '';
            $('ul#drug-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                var anchor_text = '';
                switch (searchBy) {
                    case 'brand':
                        anchor_text = '<a class="page-link" aria-label="Previous" onclick="frontendCommonMethods.searchBrandAlphabetically(\''+frontendCommonMethods.activeBrandAlphabet+'\','+previous_page_no+')>';
                        break;
                    case 'generic':
                        anchor_text = '<a class="page-link" aria-label="Previous" onclick="frontendCommonMethods.searchGenericAlphabetically(\''+frontendCommonMethods.activeGenericAlphabet+'\','+previous_page_no+')>';
                        break;
                    default:
                        break;
                }
                $('ul#drug-pagination').html('<li class="page-item">' +
                    anchor_text +
                    '                                        <span>&laquo;</span>' +
                    '                                        <span class="sr-only">Previous</span>' +
                    '                                    </a>' +
                    '                                </li>' +
                    '                                ');
            }

            for(var i = start_page_no; ; i++) {
                pagination_li_text = '';
                var anchor_text = '';
                switch (searchBy) {
                    case 'brand':
                        anchor_text = '<li class="page-item"><a class="page-link" onclick="frontendCommonMethods.searchBrandAlphabetically(\''+frontendCommonMethods.activeBrandAlphabet+'\','+i+')"></a></li>';
                        break;
                    case 'generic':
                        anchor_text = '<li class="page-item"><a class="page-link" onclick="frontendCommonMethods.searchGenericAlphabetically(\''+frontendCommonMethods.activeGenericAlphabet+'\','+i+')"></a></li>';
                        break;
                    default:
                        break;
                }
                if (i == pageNo) {
                    pagination_li_text = '<li class="page-item active"><a class="page-link" href="#">'+i+'</a></li>';
                } else {
                    pagination_li_text = anchor_text;
                }
                $('ul#drug-pagination').append(pagination_li_text);
                page_counter++;
                if (page_counter == total_pagination || page_counter > total_page) {
                    break;
                }
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                var anchor_text = '';
                switch (searchBy) {
                    case 'brand':
                        anchor_text = '<a class="page-link" aria-label="Next" onclick="frontendCommonMethods.searchBrandAlphabetically(\''+frontendCommonMethods.activeBrandAlphabet+'\','+next_page_no+')>';
                        break;
                    case 'generic':
                        anchor_text = '<a class="page-link" aria-label="Next" onclick="frontendCommonMethods.searchGenericAlphabetically(\''+frontendCommonMethods.activeGenericAlphabet+'\','+next_page_no+')>';
                        break;
                    default:
                        break;
                }
                $('ul#drug-pagination').append('<li class="page-item">' +
                    anchor_text +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }

    frontendCommonMethods.totalDrug = <?php echo isset($TotalDrug) ? $TotalDrug : 0;?>;
</script>