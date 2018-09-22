<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="rslides add-resource-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-resource-page-inner-right-523x52"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 style="border-bottom:1px solid #dfdfdf;">Resources</h2>
                <div class="product-details" style="border: 0;padding-left: 0;">
                    <?php
                    foreach ($AllResources As $resource) {
                        echo '<div><a target="_blank" href="'.site_url('Resource/getResourceDetail').'?ResourceID='.$resource['ID'].'">'.$resource['Title'].'</a> </div>';
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-resource-page-bottom-left-823x115"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="rslides add-resource-page-top-right-340x355"></ul>
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
                <div class="special-reports-sidebar"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
    </div>
</section>
<script>
    frontendCommonMethods.getSideBarData();
    frontendCommonMethods.getAdvertisement(['add-resource-page-top-right-340x355', 'add-resource-page-bottom-left-823x115', 'add-resource-page-inner-left-523x52', 'add-resource-page-inner-right-523x52']);
    $('ul#main-menu li').removeClass('active');
    $('ul#main-menu li#main-menu-resource').addClass('active');
</script>