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
    <h2>International Health</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert international-health-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert international-health-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="international-health-details">
                <!-- title -->
                <h2 class="international-health-title"><?php echo $NewsInfo['Title'];?></h2>
                <!-- description -->
                <p class="international-health-description"><?php echo $NewsInfo['Description'];?></p>
                <div class="featured-international-health-img">
                    <img class="img-fluid" src="<?php echo base_url('NewsImages/'.$NewsInfo['ImagePath']);?>" alt="">
                </div>
            </div>
            <div class="international-health-list container">
                <?php
                foreach ($AllNews AS $internationalHealth) {
                    echo '<div class="international-health-item row">
                    <div class="international-health-thumb col-3">
                        <img src="'.base_url('NewsImages/'.$internationalHealth['ImagePath']).'" alt="">
                    </div>
                    <div class="international-health-info col-9">
                        <a class="international-health-title" href="'.site_url('News/showIndividualNewsDetail?NewsID='.$internationalHealth['ID']).'">'.$internationalHealth['Title'].'</a>
                        <p class="international-health-summary">'.$internationalHealth['Description'].'</p>
                        <a href="'.site_url('News/showIndividualNewsDetail?NewsID='.$internationalHealth['ID']).'" class="read-more">Read More</a>
                    </div>
                </div>';
                }
                ?>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="international-health-pagination"></ul>
            </nav>
            <div class="in-page-advert international-health-advert-bottom">
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
                    <div class="in-page-advert side-col international-health-sidebar-advert">
                        <img src="<?php echo base_url();?>application/views/images/add-4.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <!-- local international-health -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/newspaper.svg" alt="*"></span>Local News
                        </div>
                        <div class="container sidebar-international-health"></div>
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
    frontendCommonMethods.getAdvertisement(['international-health-sidebar-advert', 'international-health-advert-top-left', 'international-health-advert-top-right', 'international-health-advert-bottom']);
    // frontendCommonMethods.mainMenuActivation('resource');
    internationalHealthObject.totalNews = <?php echo isset($TotalNews) ? $TotalNews : 0;?>;
    internationalHealthObject.perPageInformationNumber = <?php echo config_item('per_page_international_health_information_number');?>;
    internationalHealthObject.populatePagination(1);
</script>