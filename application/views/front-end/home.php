<section class="all-product">
    <div class="container">
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
                            <a onclick="drugObject.searchBrandInformation()" class="search-btn"><i class="fas fa-search"></i></a>
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
                                <ul class="list-inline float-left"></ul>
                                <ul class="list-inline float-right"></ul>
                                <a href="<?php echo site_url('Brand/showAllNewProducts')?>" class="btn btn-s float-right">
                                    <i class="fas fa-chevron-right"></i> see more
                                </a>
                            </div>
                            <div class="clearfix new-brand-ul">
                                <h5 class="sub-title">
                                    New Brands
                                </h5>
                                <ul class="list-inline float-left"></ul>
                                <ul class="list-inline float-right"></ul>
                                <a href="<?php echo site_url('Brand/showAllNewBrands')?>" class="btn btn-s float-right">
                                    <i class="fas fa-chevron-right"></i> see more
                                </a>
                            </div>
                            <div class="clearfix new-presentation-ul">
                                <h5 class="sub-title">
                                    New Presentation
                                </h5>
                                <ul class="list-inline float-left"></ul>
                                <ul class="list-inline float-right"></ul>
                                <a href="<?php echo site_url('Brand/showAllNewPresentations')?>" class="btn btn-s float-right">
                                    <i class="fas fa-chevron-right"></i> see more
                                </a>
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
                        <div class="add-bottom-left-823x115">
                            <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-5.png" alt="add" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="speacial-reports"></div>
                        <a href="" class="btn btn-s float-right" style="margin-right: 26%;">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="add-home-page-top-right-305x355">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-2.png" alt="add"></a>
                </div>
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
                    <ul class="list-inline sidebar-news"></ul>
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
    drugObject.getNewBrands(0);
    drugObject.getNewPresentations(0);
    drugObject.getNewProducts(0);
    drugObject.getHighlightedBrands();
    drugObject.getAllDrugInfoForAutoComplete();
</script>