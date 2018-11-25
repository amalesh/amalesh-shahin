<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var frontendCommonMethods = {
        totalDrug: 0,
        activeBrandAlphabet: '',
        activeGenericAlphabet: '',
        viewImage: function(img) {
            var viewer = ImageViewer();
            viewer.show(img);
        },
        mainMenuActivation: function(item) {
            $('li#mainMenuHome a').removeClass('active');
            $('li#mainMenuDoctor a').removeClass('active');
            $('li#mainMenuResource a').removeClass('active');
            $('li#mainMenuAbout a').removeClass('active');
            switch (item) {
                case 'home':
                    $('li#mainMenuHome a').addClass('active');
                    break;
                case 'doctor':
                    $('li#mainMenuDoctor a').addClass('active');
                    break;
                case 'resource':
                    $('li#mainMenuResource a').addClass('active');
                    break;
                case 'about':
                    $('li#mainMenuAbout a').addClass('active');
                    break;
                default:
                    $('li#mainMenuHome a').addClass('active');
                    break;
            }
        },
        numberWithCommas: function(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        },
        incrementVisitorCount: function() {
            console.log('Method Name: frontendCommonMethods.getSideBarData Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('User/incrementVisitorCount')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.incrementVisitorCount', function(data){});
        },
        getNumberOfVisitor: function() {
            console.log('Method Name: frontendCommonMethods.getNumberOfVisitor Param:  Value: '+[].toString());
            var formURL = "<?php echo site_url('User/getNumberOfVisitor')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getNumberOfVisitor', function(totalVisitor){
                $('.visitor-count').html(frontendCommonMethods.numberWithCommas(totalVisitor));
            });
        },
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

                    $('div.sidebar-jobs').html('');
                    $('div.sidebar-news').html('');
                    $('div.sidebar-address').html('');
                    $('div.sidebar-special-reports').html('');

                    for(var i = 0; i < all_jobs.length; i++) {
                        var organization_logo = all_jobs[i].OrganizationLogo;
                        organization_logo = organization_logo != null && organization_logo.length > 0 ? '<?php echo base_url();?>'+'JobImages/'+organization_logo : '';
                        var job_title = all_jobs[i].Title;
                        job_title = job_title.length > 30 ? job_title.substr(0, 27) + '...' : job_title;
                        $('div.sidebar-jobs').append('<div class="row job side-col">' +
                            '                                <div class="col-3 pr-0" style="padding: 7px">' +
                            '                                    <img class="job-img side-col" src="'+organization_logo+'" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">' +
                            '                                </div>' +
                            '                                <div class="col-9" style="padding-right: 0; padding-left: 10px">' +
                            '                                    <p class="job-title side-col"><a href="<?php echo site_url('Job/showJobDetail?JobID=')?>'+all_jobs[i].ID+'">'+job_title+'</a></p>' +
                            '                                    <p class="job-company side-col">'+all_jobs[i].Organization+'</p>' +
                            '                                </div>' +
                            '                            </div>');
                    }

                    $('div.sidebar-jobs').append('<a href="<?php echo site_url('Job/getAllJobInformation')?>" class="side-col-see-more-btn no-outline">See All Jobs</a>');

                    for(var i = 0; i < all_address.length; i++) {
                        $('ul.sidebar-assress').append('<li class="address"><a href="<?php echo site_url('Address/getAllImportantAddress?AddressCategoryID=')?>'+all_address[i].ID+'">'+all_address[i].Name+'</a></li>');
                    }

                    $('ul.sidebar-assress').append('<a href="<?php echo site_url('Address/getAllImportantAddress')?>" class="see-more-btn no-outline">See All Adresses</a>');

                    for(var i = 0; i < all_news.length; i++) {
                        var news_image_path = all_news[i].ImagePath;
                        news_image_path = news_image_path != null && news_image_path.length > 0 ? '<?php echo base_url();?>'+'NewsImages/'+news_image_path : '';
                        var news_title = all_news[i].Title;
                        news_title = news_title.length > 30 ? news_title.substr(0, 27) + '...' : news_title;
                        $('div.sidebar-news').append('<div class="row news">' +
                            '                                <div class="col-3" style="padding: 5px; padding-left: 16px;">' +
                            '                                    <img class="news-img" style="width: 100%; height: auto; padding: 0;" src="'+news_image_path+'" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">' +
                            '                                </div>' +
                            '                                <div class="col-9" style="padding-right: 0; padding-left: 7px">' +
                            '                                    <p class="news-title side-col"><a href="<?php echo site_url('News/showIndividualNewsDetail?NewsID=')?>'+all_news[i].ID+'">'+news_title+'</a></p>' +
                            '                                    <p class="news-description side-col">' + all_news[i].PublishDateTime + '</p>' +
                            '                                </div>' +
                            '                            </div>');
                    }

                    $('div.sidebar-news').append('<a href="<?php echo site_url('News/getAllLocalNews')?>" class="side-col-see-more-btn no-outline">See All News</a>');

                    for(var i = 0; i < all_special_reports.length; i++) {
                        var report_image = all_special_reports[i].ImagePath;
                        report_image = report_image.length > 0 ? '<?php echo base_url();?>'+'JobImages/'+report_image : '';
                        var report_title = all_special_reports[i].Title;
                        report_title = report_title.length > 30 ? report_title.substr(0, 27) + '...' : report_title;
                        $('div.sidebar-special-reports').append('<div class="row news">' +
                            '                                <div class="col-3" style="padding: 5px; padding-left: 16px;">' +
                            '                                    <img class="news-img" style="width: 100%; height: auto; padding: 0;" src="'+report_image+'" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">' +
                            '                                </div>' +
                            '                                <div class="col-9" style="padding-right: 0; padding-left: 7px">' +
                            '                                    <p class="news-title side-col"><a href="'+all_special_reports[i].LinkAddress+'" target="_blank">'+report_title+'</a></p>' +
                            '                                </div>' +
                            '                            </div>');
                    }

                    $('div.sidebar-special-reports').append('<a href="<?php echo site_url('SpecialReports/getAllLocalSpecialReports')?>" class="side-col-see-more-btn no-outline">See All Reports</a>');
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
        getCommonAdvertisement: function (classNames) {
            console.log('Method Name: frontendCommonMethods.getCommonAdvertisement Param: classNames Value: '+[classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('.'+class_name).html('');
                var formURL = "<?php echo site_url('Advertisement/getAdvertisement?ClassName=')?>"+class_name;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData){
                    if (advertisementData.length) {
                        var position_class_name = advertisementData[0].ClassName;
                        var interval = advertisementData[0].Interval;
                        $('.'+advertisementData[0].ClassName).append('<img src="<?php echo base_url('AdvertisementImages/');?>'+advertisementData[0].ImagePath+'" alt="">');
                    }
                });
            }
        },
        getAdvertisement: function (classNames) {
            console.log('Method Name: frontendCommonMethods.getAdvertisement Param: classNames Value: '+[classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('#'+class_name).hide();
                var formURL = "<?php echo site_url('Advertisement/getAdvertisement?ClassName=')?>"+class_name;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData){
                    if (advertisementData.length) {
                        var position_class_name = advertisementData[0].ClassName;
                        var interval = advertisementData[0].Interval;
                        $('#'+position_class_name).html('');
                        for (var advertisement_no = 0; advertisement_no < advertisementData.length; advertisement_no++) {
                            $('#'+position_class_name).append('<div class="'+position_class_name+'">' +
                                '<img src="<?php echo base_url('AdvertisementImages/');?>'+advertisementData[advertisement_no].ImagePath+'" alt="">'+
                                '</div>');
                        }
                        $('#'+class_name).show();

                        switch (position_class_name) {
                            case 'home-product-slider':
                                $('#'+class_name).slick({
                                    slidesToScroll: 1,
                                    slidesToShow: 3,
                                    autoplay: true,
                                    autoplaySpeed: interval,
                                    infinite: true,
                                    arrows: false,
                                    responsive: [
                                        {
                                            breakpoint: 480,
                                            settings: {
                                                slidesToShow: 2,
                                            }
                                        }
                                    ]
                                });
                                break;
                            default:
                                break;
                        }
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