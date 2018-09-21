<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 6:56 PM
 */
?>
<section class="product brand">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="add-doctor-page-inner-left-523x52"></div>
            </div>
            <div class="col-md-6">
                <div class="add-doctor-page-inner-right-523x52"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="find-doctor">
                    <h2 class="title">Find a Doctor</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputSearch">Search by</label>
                                <input type="search" class="form-control" id="doctorSearchBy" placeholder="specialty or doctor name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Location</label>
                                <select class="form-control" id="doctorLocation">
                                    <option value="0">Search Cities</option>
                                    <?php
                                    foreach ($Cities AS $city) {
                                        echo '<option value="'.$city['ID'].'">'.$city['Name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Doctor Gender</label>
                                <select class="form-control" id="doctorGender">
                                    <option value="0">Any</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Area</label>
                                <input class="form-control" id="doctorArea" placeholder="Area">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">&nbsp;</div>
                        <div class="col-md-6">
                            <button class="btn" onclick="doctorObject.searchDoctor(1)"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
                <div id="doctor-information">
                    <?php
                    foreach ($AllDoctors AS $doctor) {
                        $image_path = empty($doctor['ImagePath']) ? base_url().'application/views/img/doctor.png' : base_url().'application/views/img/'.$doctor['ImagePath'];
                        $hotline_info = empty($doctor['Hotline']) ? '' : '<br>Hotline: '.$doctor['Hotline'];
                        echo '<div class="doctor-list row">
                            <div class="doctor-photo col-md-2">
                                <a href=""><img src="'.$image_path.'" alt="doctor"></a>
                            </div>
                            <div class="doctor-name  col-md-4">
                                <h5 class="name">'.$doctor['Name'].'</h5>
                                <p class="title">'.$doctor['Specialization'].'</p>
                                <p class="designation">'.$doctor['ProfessionDegree'].'</p>
                            </div>
                            <div class="doctor-address  col-md-4">
                                <span class="icon float-left"><i class="fas fa-map-marker-alt"></i></span> <strong>Chamber</strong><br><br>
                                <address CLASS="clearfix">
                                '.$doctor['ChamberAddress'].$hotline_info.'
                                </address>
                                <div class="clearfix"></div>
                            </div>
                            <div class="doctor-phone  col-md-2">
                                <span class="icon float-left"><i class="fas fa-mobile"></i></span> <strong>Phone No.</strong><br><br>
                                <div class="float-right">
                                    <p class="number">'.$doctor['PhoneNo'].'</p>
                                    <p class="number">'.$doctor['MobileNo1'].'</p>
                                    <p class="number">'.$doctor['MobileNo2'].'</p>
                                    <p class="number">'.$doctor['MobileNo3'].'</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    </div>';
                    }
                    ?>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="doctor-pagination"></ul>
                </nav>
                <div class="row">
                    <div class="col-md-12">
                        <div class="add-doctor-page-bottom-left-823x115"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="add-doctor-page-top-right-340x355"></div>
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
    frontendCommonMethods.getAdvertisement(['add-doctor-page-top-right-305x355', 'add-doctor-page-bottom-left-823x115', 'add-doctor-page-inner-left-523x52', 'add-doctor-page-inner-right-523x52']);
    doctorObject.totalDoctor = <?php echo isset($TotalDoctor) ? $TotalDoctor : 0;?>;
    doctorObject.populatePagination(1);
    $('ul#main-menu li').removeClass('active');
    $('ul#main-menu li#main-menu-doctor').addClass('active');
</script>