<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:26 AM
 */
?>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 filter-address">
                        <h1>Important address</h1>
                        <ul class="requirement-list address-list">
                            <?php
                            foreach ($AllAddressCategory AS $category) {
                                echo '<li class="address-category-'.$category['ID'].'"><i class="fas fa-chevron-right"></i><a onclick="addressObject.getCategoryWiseAddresses('.$category['ID'].')">'.$category['Name'].'</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="addresses">
                            <table class="table addtess-detail">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($AllAddress AS $address) {
                                    echo '<tr>
                                    <td>'.$address['Name'].'</td>
                                    <td class="border-left">'.$address['Address'].'</td>
                                    <td class="border-left">'.$address['ContactNumber'].'</td>
                                </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="address-pagination"></ul>
                </nav>
            </div>
            <div class="col-md-4 sidebar">
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
    addressObject.totalAddress = <?php echo isset($TotalAddress) ? $TotalAddress : 0;?>;
    addressObject.populatePagination(1);
</script>