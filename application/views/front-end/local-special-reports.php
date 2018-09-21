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
                <div class="add-special-report-page-inner-left-523x52"></div>
            </div>
            <div class="col-md-6">
                <div class="add-special-report-page-inner-right-523x52"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2>Special Reports</h2>
                <br/>
                <div class="special-reports">
                    <?php
                    foreach ($AllSpecialReports AS $report) {
                        echo '<div class="media">
                        <img class="mr-3" src="'.base_url('SpecialReportImages/'.$report['ImagePath']).'" alt="image">
                        <div class="media-body">
                        <a href="'.$report['LinkAddress'].'" target="_blank">'.$report['Title'].'</a>
                        </div>
                        </div>';
                    }
                    ?>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="special-report-pagination"></ul>
                </nav>
                <div class="row">
                    <div class="col-md-12">
                        <div class="add-special-report-page-bottom-left-823x115"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="add-special-report-page-top-right-340x355"></div>
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
    frontendCommonMethods.getAdvertisement(['add-special-report-page-top-right-340x355', 'add-special-report-page-bottom-left-823x115', 'add-special-report-page-inner-left-523x52', 'add-special-report-page-inner-right-523x52']);
    specialReportObject.totalSpecialReport = <?php echo isset($TotalSpecialReport) ? $TotalSpecialReport : 0;?>;
    specialReportObject.perPageInformationNumber = <?php echo config_item('per_page_special_report_number');?>;
    specialReportObject.populatePagination(1);
</script>