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
    <h2>Local News</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert news-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert news-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="news-details">
                <!-- title -->
                <h2 class="news-title"><?php echo $NewsInfo['Title'];?></h2>
                <!-- description -->
                <p class="news-description"><?php echo $NewsInfo['Description'];?></p>
                <div class="featured-news-img">
                    <img class="img-fluid" src="<?php echo base_url('NewsImages/'.$NewsInfo['ImagePath']);?>" alt="">
                </div>
            </div>
            <div class="news-list container">
                <?php
                foreach ($AllNews AS $news) {
                    echo '<div class="news-item row">
                    <div class="news-thumb col-3">
                        <img src="'.base_url('NewsImages/'.$news['ImagePath']).'" alt="">
                    </div>
                    <div class="news-info col-9">
                        <a class="news-title" href="'.site_url('News/showIndividualNewsDetail?NewsID='.$news['ID']).'">'.$news['Title'].'</a>
                        <p class="news-summary">'.$news['Description'].'</p>
                        <a href="'.site_url('News/showIndividualNewsDetail?NewsID='.$news['ID']).'" class="read-more">Read More</a>
                    </div>
                </div>';
                }
                ?>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="news-pagination"></ul>
            </nav>
            <div class="in-page-advert news-advert-bottom">
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
                    <div class="in-page-advert side-col news-sidebar-advert">
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
    frontendCommonMethods.getAdvertisement(['news-sidebar-advert', 'news-advert-top-left', 'news-advert-top-right', 'news-advert-bottom']);
    // frontendCommonMethods.mainMenuActivation('resource');
    newsObject.totalNews = <?php echo isset($TotalNews) ? $TotalNews : 0;?>;
    newsObject.perPageInformationNumber = <?php echo config_item('per_page_news_information_number');?>;
    newsObject.populatePagination(1);
</script>