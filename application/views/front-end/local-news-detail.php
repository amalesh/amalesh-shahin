<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 11:46 AM
 */
?>

<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="news-top">
                    <h1>Local <br> farma <br> <b>news</b> </h1>
                </div>
                <div class="featured-news">
                    <div class="news-info">
                        <h1><?php echo $NewsInfo['Title'];?></h1>
                        <p><?php echo $NewsInfo['Description'];?></p>
                    </div>
                    <div class="featured-news-img">
                        <img class="img-fluid" src="<?php echo base_url('NewsImages/'.$NewsInfo['ImagePath']);?>" alt="">
                    </div>
                </div>
                <div class="more-news text-center">
                    <p>More news</p>
                    <div class="round">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="news-list">
                    <div class="news">
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
</script>