<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:56 AM
 */

$job_title = $JobInfo['Title'];
$job_organization = !empty($JobInfo['Organization']) ? ' - '.$JobInfo['Organization'] : '';
$job_publish_date = !empty($JobInfo['PublishDate']) ? 'Posted on '.$JobInfo['PublishDate'] : '';
$job_description = $JobInfo['Description'];
$job_position = !empty($JobInfo['Position']) ? '<li><i class="fas fa-chevron-right"></i><b>Position:</b> '.$JobInfo['Position'].'</li>' : '';
$job_application_deadline = !empty($JobInfo['ApplicationDeadline']) ? '<li><i class="fas fa-chevron-right"></i><b>Application Deadline:</b> '.$JobInfo['ApplicationDeadline'].'</li>' : '';
$job_salary = !empty($JobInfo['Salary']) ? '<li><i class="fas fa-chevron-right"></i><b>Salary:</b> '.$JobInfo['Salary'].'</li>' : '';
$job_educational_requirement = !empty($JobInfo['EducationalRequirement']) ? '<li><i class="fas fa-chevron-right"></i><b>Educational Requirement:</b> '.$JobInfo['EducationalRequirement'].'</li>' : '';
$job_experience_requirement = !empty($JobInfo['ExperienceRequirement']) ? '<li><i class="fas fa-chevron-right"></i><b>Experience Requirement:</b> '.$JobInfo['ExperienceRequirement'].'</li>' : '';
$job_number_of_vacancy = !empty($JobInfo['NumberOfVacancy']) ? '<li><i class="fas fa-chevron-right"></i><b>Number of Vacancy:</b> '.$JobInfo['NumberOfVacancy'].'</li>' : '';
$job_age_limit = !empty($JobInfo['AgeLimit']) ? '<li><i class="fas fa-chevron-right"></i><b>Age Limit:</b> '.$JobInfo['AgeLimit'].'</li>' : '';
$job_location = !empty($JobInfo['Location']) ? '<li><i class="fas fa-chevron-right"></i><b>Location:</b> '.$JobInfo['Location'].'</li>' : '';
$job_source = !empty($JobInfo['JobSource']) ? '<li><i class="fas fa-chevron-right"></i><b>Job Source:</b> '.$JobInfo['JobSource'].'</li>' : '';
$job_type = !empty($JobInfo['JobType']) ? '<li><i class="fas fa-chevron-right"></i><b>Job Type:</b> '.$JobInfo['JobType'].'</li>' : '';
$job_employment_type = !empty($JobInfo['EmploymentType']) ? '<li><i class="fas fa-chevron-right"></i><b>Employment Type:</b> '.$JobInfo['EmploymentType'].'</li>' : '';
$job_nature = !empty($JobInfo['JobNature']) ? '<li><i class="fas fa-chevron-right"></i><b>Job Nature:</b> '.$JobInfo['JobNature'].'</li>' : '';
$job_applying_procedure = !empty($JobInfo['ApplyingProcedure']) ? '<li><i class="fas fa-chevron-right"></i><b>Applying Procedure:</b> '.$JobInfo['ApplyingProcedure'].'</li>' : '';
$job_image = empty($JobInfo['JobCircularImagePath']) ? '' : '<div class="more-news text-center">
                        <p>See job circular image</p>
                        <div class="round">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="job-circular-img">
                            <img class="img-fluid" src="'.base_url('JobImages/'.$JobInfo['JobCircularImagePath']).'" alt="">
                        </div>
                    </div>';
?>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="add-job-page-inner-left-523x52"></div>
            </div>
            <div class="col-md-6">
                <div class="add-job-page-inner-right-523x52"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="job-circular-head">
                    <div class="news-top">
                        <h1 class="job-circular-title">Job circular</h1>
                    </div>
                </div>
                <div class="job-details">
                    <h1><?php echo $job_title.$job_organization;?></h1>
                    <h4 class="date"><?php echo $job_publish_date;?></h4>
                    <p><?php echo $job_description;?></p>
                    <?php
                    echo '<ul class="requirement-list">'.
                        $job_position.
                        $job_application_deadline.
                        $job_salary.
                        $job_educational_requirement.
                        $job_experience_requirement.
                        $job_number_of_vacancy.
                        $job_age_limit.
                        $job_location.
                        $job_source.
                        $job_type.
                        $job_employment_type.
                        $job_nature.
                        $job_applying_procedure.'</ul>'.$job_image;
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="add-job-page-bottom-left-823x115"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="add-job-page-top-right-340x355"></div>
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
    </div>
</section>
<script>
    frontendCommonMethods.getSideBarData();
    frontendCommonMethods.getAdvertisement(['add-job-page-top-right-305x355', 'add-job-page-bottom-left-823x115', 'add-job-page-inner-left-523x52', 'add-job-page-inner-right-523x52']);
</script>