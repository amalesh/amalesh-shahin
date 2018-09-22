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

                    for(var i = 0; i < all_jobs.length; i++) {
                        $('ul.sidebar-jobs').append('<li><a href="<?php echo site_url('Job/showJobDetail?JobID=')?>'+all_jobs[i].ID+'">'+all_jobs[i].Title+'</a></li>');
                    }

                    for(var i = 0; i < all_address.length; i++) {
                        $('ul.sidebar-assress').append('<li><a href="<?php echo site_url('Address/getAllImportantAddress?AddressCategoryID=')?>'+all_address[i].ID+'">'+all_address[i].Name+'</a></li>');
                    }

                    for(var i = 0; i < all_news.length; i++) {
                        $('ul.sidebar-news').append('<li><a href="<?php echo site_url('News/showIndividualNewsDetail?NewsID=')?>'+all_news[i].ID+'">'+all_news[i].Title+'</a></li>');
                    }

                    if($('div.speacial-reports').length) {
                        $('div.speacial-reports').html('<h3 class="title">Special Reports</h3>');
                        for(var i = 0; i < all_special_reports.length; i++) {
                            $('div.speacial-reports').append('<div class="media">' +
                                '<img class="mr-3" src="<?php echo base_url();?>SpecialReportImages/'+all_special_reports[i].ImagePath+'" alt="image">'+
                                '<div class="media-body">'+
                                '<a href="'+all_special_reports[i].LinkAddress+'" target="_blank">'+all_special_reports[i].Title+'</a>'+
                                '</div>'+
                                '</div>');
                        }
                    }

                    if ($('div.special-reports-sidebar').length) {
                        $('div.special-reports-sidebar').html('<h3 class="title">Special Reports</h3>');
                        for(var i = 0; i < all_special_reports.length; i++) {
                            $('div.special-reports-sidebar').append('<div class="media">' +
                                '                        <img class="mr-3" src="<?php echo base_url();?>SpecialReportImages/'+all_special_reports[i].ImagePath+'" alt="image">' +
                                '                        <div class="media-body">' +
                                '                            <a href="'+all_special_reports[i].LinkAddress+'" target="_blank">'+all_special_reports[i].Title+'</a>' +
                                '                        </div>' +
                                '                    </div>');
                        }

                        $('div.special-reports-sidebar').append('<a href="<?php echo site_url('SpecialReports/getAllLocalSpecialReports');?>" class="btn btn-s float-right">' +
                            '                        <i class="fas fa-chevron-right"></i> see more' +
                            '                    </a>' +
                            '                    <div class="clearfix"></div>');
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
        setAdvertisementInterval: function(className) {
            $('div.'+className+' > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('#slideshow');
        },
        getAdvertisement: function (classNames) {
            console.log('Method Name: frontendCommonMethods.populatePagination Param: classNames Value: '+[classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('.'+class_name).hide();
                var formURL = "<?php echo site_url('Advertisement/getAdvertisement?ClassName=')?>"+class_name;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData){
                    if (advertisementData.length) {
                        var position_class_name = advertisementData[0].ClassName;
                        var interval = advertisementData[0].Interval;
                        $("ul."+position_class_name).html('');
                        for (var advertisement_no = 0; advertisement_no < advertisementData.length; advertisement_no++) {
                            $('ul.'+position_class_name).append('<li><img src="<?php echo base_url('AdvertisementImages/');?>'+advertisementData[advertisement_no].ImagePath+'" alt=""></li>');
                        }

                        $("ul."+position_class_name).responsiveSlides({
                            auto: true,
                            timeout: interval * 1000
                        });

                        $('ul.'+position_class_name).show();
                    }
                });
            }
        },
        inArrayCaseInsensitive: function (value, dataArray) {
            var index = -1;
            value = value.toLowerCase();
            for(var i = 0; i < dataArray.length; i++) {
                if (value == $.trim(dataArray[i].toLowerCase())) {
                    index = i;
                    break;
                }
            }

            return index;
        }
    }

    frontendCommonMethods.totalDrug = <?php echo isset($TotalDrug) ? $TotalDrug : 0;?>;
</script>