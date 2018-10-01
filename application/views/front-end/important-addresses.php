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
            <div class="col-md-6">
                <ul class="rslides add-address-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-address-page-inner-right-523x52"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 filter-address">
                        <h1>Important address</h1>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">City</label>
                            <select class="form-control" id="addressCity">
                                <option value="0">Search Cities</option>
                                <?php
                                foreach ($Cities AS $city) {
                                    echo '<option value="'.$city['Name'].'">'.$city['Name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group imp-address-filter">
                            <label for="exampleInputEmail1">Area</label>
                            <input type="text" class="form-control" id="addressArea" placeholder="Search Area">
                            <input type="button" class="btn" value="Search" onclick="addressObject.getLocationWiseAddresses()">
                        </div>
                        <ul class="requirement-list address-list">
                            <?php
                            $selected_category_name = '';
                            foreach ($AllAddressCategory AS $category) {
                                if ($category['ID'] == $AddressCategoryID) {
                                    echo '<li class="address-category-'.$category['ID'].' highlight"><i class="fas fa-chevron-right"></i><a onclick="addressObject.getCategoryWiseAddresses('.$category['ID'].')">'.$category['Name'].'</a></li>';
                                    $selected_category_name = $category['Name'];
                                } else {
                                    echo '<li class="address-category-'.$category['ID'].'"><i class="fas fa-chevron-right"></i><a onclick="addressObject.getCategoryWiseAddresses('.$category['ID'].')">'.$category['Name'].'</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="addresses">
                            <h4 id="currently-selected-filter"><?php echo $selected_category_name;?></h4>
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
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="address-pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-address-page-bottom-left-823x115"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <ul class="rslides add-address-page-top-right-340x355"></ul>
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
    frontendCommonMethods.getAdvertisement(['add-address-page-top-right-340x355', 'add-address-page-bottom-left-823x115', 'add-address-page-inner-left-523x52', 'add-address-page-inner-right-523x52']);
    addressObject.totalAddress = <?php echo isset($TotalAddress) ? $TotalAddress : 0;?>;
    addressObject.populatePagination(1);
</script>