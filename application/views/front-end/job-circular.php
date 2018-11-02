<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:56 AM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Job Circular</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert job-circular-list-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert job-circular-list-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="job-list job-list-page container">
                <?php
                foreach ($AllJobs AS $job) {
                    $organization_logo = $job['OrganizationLogo'];
                    $organization_logo = empty($organization_logo) ? base_url().'JobImages/'.$organization_logo : '';

                    echo '<div class="row job">
                    <div class="col-md-9 col-10">
                        <a href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'"><h3 class="job-title">Medical Officer/ Physician</h3></a>
                        <p class="job-post-date">Posted on <span>'.$job['PublishDate'].'</span></p>
                        <p class="job-info-summary">'.$job['Description'].'</p>
                        <a class="job-detail-btn no-outline" href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'">View Job Detail</a>
                    </div>
                    <div class="col-md-3 col-2 p-0">
                        <img class="job-img" src="'.$organization_logo.'" alt="">
                    </div>
                </div>';
                }
                ?>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination">
                    <!-- <li class="page-item">
                      <a class="page-link prev" href="#"><i class="fas fa-chevron-left"></i> Previous</i></a>
                    </li> -->
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link next" href="#">Next <i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
            <div class="in-page-advert job-circular-list-advert-bottom">
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
                    <div class="in-page-advert side-col job-circular-list-sidebar-advert">
                        <img src="<?php echo base_url();?>application/views/images/add-4.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <!-- local news -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/newspaper.svg" alt="*"></span>Local News
                        </div>
                        <div class="container sidebar-assress"></div>
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
    // frontendCommonMethods.getAdvertisement(['job-circular-list-sidebar-advert', ' job-circular-list-advert-top-left', ' job-circular-list-advert-top-right', ' job-circular-list-advert-bottom']);
    //jobObject.totalJob = <?php //echo isset($TotalJob) ? $TotalJob : 0;?>//;
    //jobObject.perPageInformationNumber = <?php //echo config_item('per_page_job_information_number');?>//;
    //jobObject.populatePagination(1);
</script>