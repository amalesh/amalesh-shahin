<!-- banner -->
<!-- International Health -->
<!-- Brand Detail -->
<!-- Search click event -->
<div class="banner d-md-flex d-none">
    <div class="search-wrapper">
        <ul class="search-tabs group">
            <li class="brand active"><a onclick="drugObject.changeSearchOption('brand')" class="search_option_type search_by_brand">Brand</a></li>
            <li class="generic"><a onclick="drugObject.changeSearchOption('generic')" class="search_option_type search_by_generic">Generic</a></li>
            <li class="indication"><a onclick="drugObject.changeSearchOption('indication')" class="search_option_type search_by_indication">Indication</a></li>
            <li class="manufacture"><a onclick="drugObject.changeSearchOption('manufacturer')" class="search_option_type search_by_manufacturer">Manufacture</a></li>
        </ul>
        <div class="search">
            <input class="search-bar no-outline" type="text" id="searchDrugOption">
            <button class="search-btn no-outline" onclick="drugObject.searchBrandInformation()" id="searchInformation"><img src="<?php echo base_url().'application/views/';?>images/icons/magnifying-glass.svg" class="search-icon" alt=""></button>
        </div>
        <div class="alphabets">
            <a onclick="drugObject.searchAlphabetically('a')" class="alphabet-link">A</a>
            <a onclick="drugObject.searchAlphabetically('b')" class="alphabet-link">B</a>
            <a onclick="drugObject.searchAlphabetically('c')" class="alphabet-link">C</a>
            <a onclick="drugObject.searchAlphabetically('d')" class="alphabet-link">D</a>
            <a onclick="drugObject.searchAlphabetically('e')" class="alphabet-link">E</a>
            <a onclick="drugObject.searchAlphabetically('f')" class="alphabet-link">F</a>
            <a onclick="drugObject.searchAlphabetically('g')" class="alphabet-link">G</a>
            <a onclick="drugObject.searchAlphabetically('h')" class="alphabet-link">H</a>
            <a onclick="drugObject.searchAlphabetically('i')" class="alphabet-link">I</a>
            <a onclick="drugObject.searchAlphabetically('j')" class="alphabet-link">J</a>
            <a onclick="drugObject.searchAlphabetically('k')" class="alphabet-link">K</a>
            <a onclick="drugObject.searchAlphabetically('l')" class="alphabet-link">L</a>
            <a onclick="drugObject.searchAlphabetically('m')" class="alphabet-link">M</a>
            <a onclick="drugObject.searchAlphabetically('n')" class="alphabet-link">N</a>
            <a onclick="drugObject.searchAlphabetically('o')" class="alphabet-link">O</a>
            <a onclick="drugObject.searchAlphabetically('p')" class="alphabet-link">P</a>
            <a onclick="drugObject.searchAlphabetically('q')" class="alphabet-link">Q</a>
            <a onclick="drugObject.searchAlphabetically('r')" class="alphabet-link">R</a>
            <a onclick="drugObject.searchAlphabetically('s')" class="alphabet-link">S</a>
            <a onclick="drugObject.searchAlphabetically('t')" class="alphabet-link">T</a>
            <a onclick="drugObject.searchAlphabetically('u')" class="alphabet-link">U</a>
            <a onclick="drugObject.searchAlphabetically('v')" class="alphabet-link">V</a>
            <a onclick="drugObject.searchAlphabetically('w')" class="alphabet-link">W</a>
            <a onclick="drugObject.searchAlphabetically('x')" class="alphabet-link">X</a>
            <a onclick="drugObject.searchAlphabetically('y')" class="alphabet-link">Y</a>
            <a onclick="drugObject.searchAlphabetically('z')" class="alphabet-link">Z</a>
        </div>
    </div>
</div>

<!-- home product slider -->
<div class="home-product-slider-container container">
    <div class="home-product-slider-wrapper">
        <div id="home-product-slider">
            <div class="home-product-slide">
                <img src="<?php echo base_url().'application/views/';?>images/home-product-slide-1.jpg" alt="">
            </div>
            <div class="home-product-slide">
                <img src="<?php echo base_url().'application/views/';?>images/home-product-slide-2.jpg" alt="">
            </div>
            <div class="home-product-slide">
                <img src="<?php echo base_url().'application/views/';?>images/home-product-slide-3.jpg" alt="">
            </div>
            <div class="home-product-slide">
                <img src="<?php echo base_url().'application/views/';?>images/home-product-slide-1.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!-- home advert -->
<div id="home-advert-container-top" class="container advert-container home-advert-container1">
    <a href="#" class="advert no-outline">
        <img src="<?php echo base_url().'application/views/';?>images/home-advert-1.jpg" alt="Click this link!">
    </a>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <!-- drug update -->
        <div class="col-md-8 col-12">
            <div class="content-section">
                <div class="section-header drug-update-header">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/medicine.svg" alt="*"></span>Drug Update
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 section-col new-product-information"></div>
                        <div class="col-md-4 section-col new-brand-information"></div>
                        <div class="col-md-4 section-col new-presentation-information"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- star product -->
        <div class="col-md-4 col-12">
            <div class="star-product" id="highlighted-product"></div>
        </div>
    </div>
    <div class="row">
        <!-- job circular -->
        <div class="col-md-6 col-12">
            <div class="content-section" style="padding: 0; max-height: none;">
                <div class="section-header own-pad" style="margin-bottom: 16px;">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Job Circular
                    <a class="section-header-view-all-btn no-outline" href="<?php echo site_url('Job/getAllJobInformation')?>">See All jobs</a>
                </div>
                <div class="container home-job-circular-list"></div>
            </div>
        </div>
        <!-- local news -->
        <div class="col-md-6 col-12">
            <div class="content-section" style="padding: 0 0 24px 0; max-height: none;">
                <div class="section-header own-pad" style="margin-bottom: 16px;">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/newspaper.svg" alt="*"></span>Local News
                    <a class="section-header-view-all-btn no-outline" href="<?php echo site_url('News/getAllLocalNews')?>">See All News</a>
                </div>
                <div class="container home-local-news-list"></div>
            </div>
        </div>
    </div>
</div>

<!-- home advert -->
<div id="home-advert-container-mid" class="container advert-container home-advert-container2">
    <a href="#" class="advert no-outline">
        <img src="<?php echo base_url().'application/views/';?>images/home-advert-1.jpg" alt="Click this link!">
    </a>
</div>

<!-- special reports slider -->
<div class="home-special-report-slider-container container">
    <div class="home-special-report-slider-wrapper content-section">
        <div class="section-header" style="margin-bottom: 24px;">
            <span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Special Reports
            <a class="section-header-view-all-btn no-outline" href="<?php echo site_url('SpecialReports/getAllLocalSpecialReports')?>">See All Special Reports</a>
        </div>
        <div id="home-special-report-slider" class="home-special-report-list"></div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <!-- important addresses -->
        <div class="col-md-6 col-12" style="height: fit-content;">
            <div class="content-section min-height">
                <div class="section-header own-pad" style="margin-bottom: 24px;">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Important Addresses
                </div>
                <ul class="address-list home-address-list"></ul>
            </div>
        </div>
        <!-- Resources -->
        <div class="col-md-6 col-12" style="height: fit-content;">
            <div class="content-section min-height">
                <div class="section-header own-pad" style="margin-bottom: 24px;">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Resources
                </div>
                <ul class="resource-item-list"></ul>
            </div>
        </div>
    </div>
</div>

<!-- bottom quote section -->
<div class="bottom-quote-section container home-bottom-quote-section">
    <div class="row">
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/do-not-use.jpg" alt="">
        </div>
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/visitor.jpg" alt="">
            <div class="visitor">
                <p>visitor</p>
                <p class="visitor-count"></p>
            </div>
        </div>
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/do-not-use.jpg" alt="">
        </div>
    </div>
</div>

<script>
    $('.banner').css('background-image', '<?php echo base_url().'application/views/';?>images/banner-bg.jpg');
    $('.slick-prev.slick-arrow:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/left-arrow-white.png');
    $('.slick-next.slick-arrow:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/right-arrow-white.png');
    $('.slick-prev.slick-arrow.slick-disabled:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/left-arrow-white.png');
    $('.slick-next.slick-arrow.slick-disabled:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/right-arrow-white.png');
    // frontendCommonMethods.getAdvertisement(['home-product-slider', 'home-advert-container-top', 'home-advert-container-mid']);
    drugObject.getSpecialReports();
    drugObject.getJobCirculars();
    drugObject.getLocalNews();
    drugObject.getImportantAddress();
    drugObject.getResources();
    drugObject.getNewBrands(0);
    drugObject.getNewPresentations(0);
    drugObject.getNewProducts(0);
    drugObject.getHighlightedBrands();
    drugObject.getAllDrugInfoForAutoComplete('brand');
    frontendCommonMethods.mainMenuActivation('home');
</script>