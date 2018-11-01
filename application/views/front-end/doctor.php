<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 6:56 PM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Doctors</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-right">
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
                    <span>Find Doctors</span> <i class="fas fa-filter d-md-none d-blocK"></i>
                </div>
                <!-- doctor search -->
                <div class="container" style="padding-bottom: 20px">
                    <div class="address-search row">
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control" id="doctorLocation">
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
                            <input type="search" class="form-control" id="doctorSearchBy" placeholder="Specialty or Doctor Name">
                        </div>
                        <div class="col-md-2 col-12 address-search-col"></div>
                    </div>
                    <div class="address-search row">
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control" id="doctorGender">
                                    <option value="0">Search by Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 address-search-col">
                            <input class="form-control" id="doctorArea" placeholder="Search By Area">
                        </div>
                        <div class="col-md-2 col-12 address-search-col">
                            <button class="btn theme-btn" style="width: 100%;" onclick="doctorObject.searchDoctor(1)">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctor-list container" id="doctor-info-list">
                <?php
                foreach ($AllDoctors AS $doctor) {
                    $image_path = empty($doctor['ImagePath']) ? base_url().'application/views/images/doctor.png' : base_url().'application/views/img/'.$doctor['ImagePath'];
                    $hotline_info = empty($doctor['Hotline']) ? '' : '<br>Hotline: '.$doctor['Hotline'];
                    echo '<div class="doctor row">
                    <div class="col-md-2 col-3 doctor-img">
                        <img src="'.$image_path.'" alt="">
                    </div>
                    <div class="col-md-10 col-9">
                        <h3 class="doctor-name">'.$doctor['Name'].'</h3>
                        <div class="doctor-info d-md-block d-none">
                            <div class="row">
                                <div class="col-5">
                                    <p class="doctor-info-title">'.$doctor['Specialization'].'</p>
                                    <p class="doctor-info-description">'.$doctor['ProfessionDegree'].'</p>
                                </div>
                                <div class="col">
                                    <p class="doctor-info-title">
                                        <i class="fas fa-map-marker-alt"></i> Chamber
                                    </p>
                                    <p class="doctor-info-description">'.$doctor['ChamberAddress'].$hotline_info.'</p>
                                </div>
                                <div class="col">
                                    <p class="doctor-info-title">
                                        <i class="fas fa-phone" style="transform: scaleX(-1);"></i>  Phone No.
                                    </p>
                                    <p class="doctor-info-description">
                                    <p class="number">'.$doctor['PhoneNo'].'</p>
                                    <p class="number">'.$doctor['MobileNo1'].'</p>
                                    <p class="number">'.$doctor['MobileNo2'].'</p>
                                    <p class="number">'.$doctor['MobileNo3'].'</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination">
                    <!-- <li class="page-item">
                      <a class="page-link prev" href="#"><i class="fas fa-chevron-left"></i> Previous</i></a>
                    </li> -->
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link next" href="#">Next <i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
            <div class="in-page-advert doctor-advert-bottom">
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
                    <div class="in-page-advert side-col doctor-sidebar-advert">
                        <img src="<?php echo base_url();?>application/views/images/add-4.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <!-- local news -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="<?php echo base_url();?>application/views/images/icons/newspaper.svg" alt="*"></span>Local News
                        </div>
                        <div class="container sidebar-assress"></div>
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
    // frontendCommonMethods.getAdvertisement(['doctor-sidebar-advert', ' doctor-advert-top-left', ' doctor-advert-top-right', ' doctor-advert-bottom']);
    //doctorObject.totalDoctor = <?php //echo isset($TotalDoctor) ? $TotalDoctor : 0;?>//;
    //doctorObject.populatePagination(1);
    frontendCommonMethods.mainMenuActivation('doctor');
</script>