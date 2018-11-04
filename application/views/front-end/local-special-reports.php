<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Special Reports</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert special-report-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert special-report-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="special-report-list container">
                <?php
                foreach ($AllSpecialReports AS $report) {
                    echo '<div class="news-item row">
                    <div class="news-thumb col-3">
                        <img src="'.base_url('SpecialReportImages/'.$report['ImagePath']).'" alt="">
                    </div>
                    <div class="news-info col-9">
                        <a class="news-title" href="'.$report['LinkAddress'].'" target="_blank">'.$report['Title'].'</a>
                        <a href="'.$report['LinkAddress'].'" target="_blank" class="read-more">Read More</a>
                    </div>
                </div>';
                }
                ?>
            </div>
            <div class="in-page-advert special-report-advert-bottom">
                <img src="<?php echo base_url();?>application/views/images/add-12.png" alt="">
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="container">
                <div class="row">
                    <!-- job circular -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/briefcase.svg" alt="*"></span>Job Circular
                        </div>
                        <div class="container sidebar-jobs"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="in-page-advert side-col special-report-sidebar-advert">
                        <img src="<?php echo base_url();?>application/views/images/add-4.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <!-- local news -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/newspaper.svg" alt="*"></span>Local News
                        </div>
                        <div class="container sidebar-news"></div>
                    </div>
                </div>
                <div class="row">
                    <!-- special reports -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/newspaper.svg" alt="*"></span>Special Reports
                        </div>
                        <div class="container sidebar-special-reports"></div>
                    </div>
                </div>
                <div class="row">
                    <!-- important addresses -->
                    <div class="content-section col-12" style="padding: 0; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/briefcase.svg" alt="*"></span>Important Addresses
                        </div>
                        <ul class="address-list sidebar-assress"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    frontendCommonMethods.getSideBarData();
    // frontendCommonMethods.getAdvertisement(['special-report-sidebar-advert', ' special-report-advert-top-left', ' special-report-advert-top-right', ' special-report-advert-bottom']);
    frontendCommonMethods.mainMenuActivation('resource');
</script>