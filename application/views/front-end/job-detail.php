<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:56 AM
 */

$job_title = $JobInfo['Title'];
$job_organization = !empty($JobInfo['Organization']) ? ' - '.$JobInfo['Organization'] : '';
$job_publish_date = !empty($JobInfo['PublishDate']) ? $JobInfo['PublishDate'] : '';
$job_description = $JobInfo['Description'];
$job_position = !empty($JobInfo['Position']) ? $JobInfo['Position'] : '';
$job_application_deadline = !empty($JobInfo['ApplicationDeadline']) ? $JobInfo['ApplicationDeadline'] : '';
$job_salary = !empty($JobInfo['Salary']) ? $JobInfo['Salary'] : '';
$job_educational_requirement = !empty($JobInfo['EducationalRequirement']) ? $JobInfo['EducationalRequirement'] : '';
$job_experience_requirement = !empty($JobInfo['ExperienceRequirement']) ? $JobInfo['ExperienceRequirement'] : '';
$job_number_of_vacancy = !empty($JobInfo['NumberOfVacancy']) ? $JobInfo['NumberOfVacancy'] : '';
$job_age_limit = !empty($JobInfo['AgeLimit']) ? $JobInfo['AgeLimit'] : '';
$job_location = !empty($JobInfo['Location']) ? $JobInfo['Location'] : '';
$job_source = !empty($JobInfo['JobSource']) ? $JobInfo['JobSource'] : '';
$job_type = !empty($JobInfo['JobType']) ? $JobInfo['JobType'] : '';
$job_employment_type = !empty($JobInfo['EmploymentType']) ? $JobInfo['EmploymentType'] : '';
$job_nature = !empty($JobInfo['JobNature']) ? $JobInfo['JobNature'] : '';
$job_applying_procedure = !empty($JobInfo['ApplyingProcedure']) ? $JobInfo['ApplyingProcedure'] : '';
$job_image = empty($JobInfo['JobCircularImagePath']) ? '' : '<div class="col-md-6 col-12 job-circular-image-wrapper">
                                <div class="job-circular-image">
                                    <img src="'.base_url('JobImages/'.$JobInfo['JobCircularImagePath']).'" class="gallery-items" alt="">
                                    <div class="d-flex justify-content-around">
                                        <a class="btn no-outline" onclick="frontendCommonMethods.viewImage(\''.base_url('JobImages/'.$JobInfo['JobCircularImagePath']).'\')"><i class="material-icons"></i> View</a>
                                        <a class="btn no-outline" href="'.base_url('JobImages/'.$JobInfo['JobCircularImagePath']).'" target="_blank" download><i class="material-icons"></i> Download</a>
                                    </div>
                                </div>
                            </div>';
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
            <div class="in-page-advert job-circular-detail-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert job-circular-detail-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="content-section main">
                <div class="job-details">
                    <h2 class="job-title"><?php echo $job_title;?></h2>
                    <p class="job-post-date">Posted on <span><?php echo $job_title.$job_organization;?></span></p>
                    <p class="job-description"><?php echo $job_title;?></p>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12 pl-0">
                                <!-- job info table -->
                                <div class="job-info-table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="job-info-title">Title</td>
                                            <td>: <?php echo $job_title;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Job Type</td>
                                            <td>: <?php echo $job_type;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Salary</td>
                                            <td>: <?php echo $job_salary;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Application Deadline</td>
                                            <td>: <?php echo $job_application_deadline;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Position</td>
                                            <td>: <?php echo $job_position;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Educational Requirement</td>
                                            <td>: <?php echo $job_title;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Experience Requirement</td>
                                            <td>: <?php echo $job_experience_requirement;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">Age Limit</td>
                                            <td>: <?php echo $job_age_limit;?></td>
                                        </tr>
                                        <tr>
                                            <td class="job-info-title">No. of Vacancy</td>
                                            <td>: <?php echo $job_number_of_vacancy;?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- job circular image -->
                            <?php echo $job_image;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-section main" style="margin-top: 15px">
                <!-- more jobs -->
                <div class="section-header own-pad" style="margin-bottom: 10px; padding: 24px 30px 16px 30px;">
                    You may also be interested in
                </div>
                <div class="job-list container">
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
            </div>
            <div class="in-page-advert job-circular-detail-advert-bottom">
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
                    <div class="in-page-advert side-col job-circular-detail-sidebar-advert">
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
    frontendCommonMethods.getCommonAdvertisement(['job-circular-detail-sidebar-advert', 'job-circular-detail-advert-top-left', 'job-circular-detail-advert-top-right', 'job-circular-detail-advert-bottom']);
</script>