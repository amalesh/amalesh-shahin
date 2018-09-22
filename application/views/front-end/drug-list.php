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
                <ul class="rslides add-brand-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-brand-page-inner-right-523x52"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="presentation">
                    <div class="presentation-table">
                        <h1><?php echo $PageTitle;?></h1>
                        <table class="table" id="product-list">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 150px;">Brand Name</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Generic</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody class="drug-list">
                            <?php
                            foreach ($AllBrands AS $brand) {
                                echo '<tr>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=brand&Value=').$brand['Name'].'">'.$brand['Name'].'</a></td>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=manufacturer&Value=').$brand['ManufacturerName'].'">'.$brand['ManufacturerName'].'</a></td>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=generic&Value=').$brand['GenericName'].'">'.$brand['GenericName'].'</a></td>';
                                echo '<td>'.$brand['PriceInBDT'].' Tk</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="drug-pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-brand-page-bottom-left-823x115"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="rslides add-brand-page-top-right-340x355"></ul>
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
    frontendCommonMethods.getAdvertisement(['add-brand-page-top-right-340x355', 'add-brand-page-bottom-left-823x115', 'add-brand-page-inner-left-523x52', 'add-brand-page-inner-right-523x52']);
    drugObject.populatePagination(1);
</script>