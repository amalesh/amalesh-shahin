<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:56 AM
 */
?>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="job-circular-head">
                    <div class="news-top">
                        <h1 class="job-circular-title">Job circular</h1>
                    </div>
                </div>
                <div class="job-list">
                    <?php
                    foreach ($AllJobs AS $job) {
                        echo '<div class="job">
                        <div class="job-info">
                            <a href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'"><h1 class="job-title"> <i class="fas fa-chevron-right"></i> '.$job['Title'].'</h1></a>
                            <h4 class="date">Posted on '.$job['PublishDate'].'</h4>
                            <p>'.$job['Description'].'</p>
                        </div>
                        <div class="see-more">
                            <a href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'">Read more</a>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="job-circular-pagination"></ul>
                </nav>
            </div>
            <div class="col-md-4">
                <div class="product-add-2">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-17.png" alt="add" class="img-fluid"></a>
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
                <div class="special-reports-sidebar"></div>
            </div>
        </div>
    </div>
</section>
<script>
    frontendCommonMethods.getSideBarData();
    jobObject.totalJob = <?php echo isset($TotalJob) ? $TotalJob : 0;?>;
    jobObject.perPageInformationNumber = <?php echo config_item('per_page_job_information_number');?>;
    jobObject.populatePagination(1);
</script>