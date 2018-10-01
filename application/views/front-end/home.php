<section class="all-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="rslides add-home-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-home-page-inner-right-523x52"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="search-bar">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?php echo base_url().'application/views/';?>img/img-1.png" alt="search" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <ul class="list-inline text-center">
                                <li class="list-inline-item"><a class="search_option_type search_by_brand" onclick="drugObject.changeSearchOption('brand')">Brand</a></li><span class="separator"></span>
                                <li class="list-inline-item"><a class="search_option_type search_by_generic" onclick="drugObject.changeSearchOption('generic')">Generic</a></li><span class="separator"></span>
                                <li class="list-inline-item"><a class="search_option_type search_by_indication" onclick="drugObject.changeSearchOption('indication')">Indication</a></li><span class="separator"></span>
                                <li class="list-inline-item"><a class="search_option_type search_by_manufacturer" onclick="drugObject.changeSearchOption('manufacturer')">Manufacturer</a></li>
                            </ul>
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="searchDrugOption">
                            <a onclick="drugObject.searchBrandInformation()" id="searchInformation" class="search-btn"><i class="fas fa-search"></i></a>
                            <span class="error_message invalid-search-option-error">Please enter a valid search option.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="drug-update">
                            <h4 class="title">DRUG UPDATE</h4>
                            <div class="clearfix new-products-ul">
                                <h5 class="sub-title">
                                    New Products
                                </h5>
                                <div class="row">
                                    <div class="col-md-6"><ul class="list-inline float-left"></ul></div>
                                    <div class="col-md-6"><ul class="list-inline float-right"></ul></div>
                                </div>
                                <div class="clearfix"><a href="<?php echo site_url('Brand/showAllNewProducts')?>" class="btn btn-s float-right">
                                    <i class="fas fa-chevron-right"></i> see more
                                </a></div>
                            </div>
                            <div class="clearfix new-brand-ul">
                                <h5 class="sub-title">
                                    New Brands
                                </h5>
                                <div class="row">
                                    <div class="col-md-6"><ul class="list-inline float-left"></ul></div>
                                    <div class="col-md-6"><ul class="list-inline float-right"></ul></div>
                                </div>
                                <div class="clearfix"> <a href="<?php echo site_url('Brand/showAllNewBrands')?>" class="btn btn-s float-right">
                                    <i class="fas fa-chevron-right"></i> see more
                                    </a></div>
                            </div>
                            <div class="clearfix new-presentation-ul">
                                <h5 class="sub-title">
                                    New Presentation
                                </h5>
                                <div class="row">
                                    <div class="col-md-6"><ul class="list-inline float-left"></ul></div>
                                    <div class="col-md-6"><ul class="list-inline float-right"></ul></div>
                                </div>
                                <div class="clearfix"><a href="<?php echo site_url('Brand/showAllNewPresentations')?>" class="btn btn-s float-right">
                                    <i class="fas fa-chevron-right"></i> see more
                                    </a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-highlights"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-home-page-bottom-left-823x115"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="speacial-reports"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="rslides add-home-page-top-right-305x355"></ul>
                <div class="sidebar-news">
                    <h4 class="title">JOB CIRCULAR</h4>
                    <ul class="list-inline sidebar-jobs"></ul>
                    <ul class="list-inline">
                        <a href="<?php echo site_url('Job/getAllJobInformation')?>" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="sidebar-news">
                    <h4 class="title">LOCAL NEWS</h4>
                    <ul class="list-inline"></ul>
                    <ul class="list-inline">
                        <a href="<?php echo site_url('News/getAllLocalNews')?>" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="sidebar-news">
                    <h4 class="title">IMPORTANT ADDRESSES</h4>
                    <ul class="list-inline sidebar-assress"></ul>
                    <ul class="list-inline">
                        <a href="<?php echo site_url('Address/getAllImportantAddress')?>" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="visitor">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="<?php echo base_url().'application/views/';?>img/img-9.png" alt="image">
            </div>
            <div class="col-md-6 text-center">
                <h3 class="title">Visitor</h3>
                <span class="counter">123,45,67</span>
            </div>
            <div class="col-md-3 text-center">
                <img src="<?php echo base_url().'application/views/';?>img/img-10.png" alt="image">
            </div>
        </div>
    </div>
</section>

<script>
    frontendCommonMethods.getSideBarData();
    frontendCommonMethods.getAdvertisement(['add-home-page-top-right-305x355', 'add-home-page-bottom-left-823x115', 'add-home-page-inner-left-523x52', 'add-home-page-inner-right-523x52']);
    drugObject.getNewBrands(0);
    drugObject.getNewPresentations(0);
    drugObject.getNewProducts(0);
    drugObject.getHighlightedBrands();
    drugObject.getAllDrugInfoForAutoComplete();
    $('ul#main-menu li').removeClass('active');
    $('ul#main-menu li#main-menu-home').addClass('active');
    drugObject.changeSearchOption('brand');
</script>