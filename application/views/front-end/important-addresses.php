<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:26 AM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Important Addresses</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert address-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert address-advert-top-right">
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
                <div class="section-header d-flex justify-content-between" style="margin-bottom: 0px; padding: 24px 30px 16px 30px;">
                    <span>Find Address</span> <i class="fas fa-filter d-md-none d-blocK"></i>
                </div>
                <!-- address search -->
                <div class="container" style="padding-bottom: 20px">
                    <div class="address-search row">
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control" id="addressCity">
                                    <option value="0">Search by City</option>
                                    <?php
                                    foreach ($Cities AS $city) {
                                        echo '<option value="'.$city['ID'].'">'.$city['Name'].'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 address-search-col">
                            <input type="search" class="form-control" id="addressArea" placeholder="Search by Area">
                        </div>
                        <div class="col-md-2 col-12 address-search-col">
                            <button class="btn theme-btn" style="width: 100%;" onclick="addressObject.getLocationWiseAddresses()">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- use "selected" class on the selected items -->
            <div class="address-search-filters">
                      <span id="address-filter-list">
                          <span>Filter: </span>
                          <?php
                          $selected_category_name = '';
                          $category_no = 0;
                          foreach ($AllAddressCategory AS $category) {
                              $additional_filter_class = $category_no < 4 ? '' : ' address-additional-filter';
                              if ($category['ID'] == $AddressCategoryID) {
                                  echo '<label class="address-category-'.$category['ID'].' search-tag address-search-tag highlight'.$additional_filter_class.'"><a onclick="addressObject.getCategoryWiseAddresses('.$category['ID'].')">'.$category['Name'].'</a></label>';
                                  $selected_category_name = $category['Name'];
                              } else {
                                  echo '<label class="address-category-'.$category['ID'].' search-tag address-search-tag'.$additional_filter_class.'"><a onclick="addressObject.getCategoryWiseAddresses('.$category['ID'].')">'.$category['Name'].'</a></label>';
                              }
                              $category_no++;
                          }
                          ?>
                      </span>
                <div class="dropdown address-search-filter-dropdown">
                    <button class="btn dropdown-toggle" type="button" onclick="addressObject.toggleFilterOption()">
                        <span id="address-filter-text">View All</span>
                        <div class="theme-down-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </button>
                </div>
            </div>
            <div class="content-section main">
                <div class="container address-table table-responsive">
                    <table class="table" id="address-list-table">
                        <thead>
                        <tr>
                            <th scope="col name-col" style="width: 30%">Name</th>
                            <th scope="col address-col" style="width: 35%">Address</th>
                            <th scope="col contact-col" style="width: 35%">Contact</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($AllAddress AS $address) {
                            echo '<tr>
                                    <td>'.$address['Name'].'</td>
                                    <td>'.$address['Address'].'</td>
                                    <td>'.$address['ContactNumber'].'</td>
                                </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="address-pagination"></ul>
            </nav>
            <div class="in-page-advert address-advert-bottom">
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
                    <div class="in-page-advert side-col address-sidebar-advert">
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
    addressObject.toggleFilterOption();
    frontendCommonMethods.getAdvertisement(['address-sidebar-advert', 'address-advert-top-left', 'address-advert-top-right', 'address-advert-bottom']);
    addressObject.totalAddress = <?php echo isset($TotalAddress) ? $TotalAddress : 0;?>;
    addressObject.populatePagination(1);
</script>