<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 10:27 AM
 */
?>

<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="rslides add-news-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-news-page-inner-right-523x52"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="news-top no-border padding-bottom-10">
                    <h1>Local <br> farma <br> <b>news</b> </h1>
                </div>

                <div class="news-list">
                    <div class="news padding-top-30">
                        <?php
                        foreach ($AllNews AS $news) {
                            echo '<div class="job">
                            <div class="job-info">
                                <a href="'.site_url('News/showIndividualNewsDetail?NewsID='.$news['ID']).'"><h1 class="job-title"> <i class="fas fa-chevron-right"></i> '.$news['Title'].'</h1></a>
                                <p>'.$news['Description'].'</p>
                                <a href="'.site_url('News/showIndividualNewsDetail?NewsID='.$news['ID']).'" class="see-details">See more</a>
                            </div>
                            <div class="see-more">
                                <img src="'.base_url('NewsImages/'.$news['ImagePath']).'" alt="">
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="news-pagination"></ul>
                </nav>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-news-page-bottom-left-823x115"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <ul class="rslides add-news-page-top-right-340x355"></ul>
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
    frontendCommonMethods.getAdvertisement(['add-news-page-top-right-340x355', 'add-news-page-bottom-left-823x115', 'add-news-page-inner-left-523x52', 'add-news-page-inner-right-523x52']);
    newsObject.totalNews = <?php echo isset($TotalNews) ? $TotalNews : 0;?>;
    newsObject.perPageInformationNumber = <?php echo config_item('per_page_news_information_number');?>;
    newsObject.populatePagination(1);
</script>