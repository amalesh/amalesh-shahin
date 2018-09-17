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
                                    <option value="0">Search cities</option>
                                    <option value="dhaka">Dhaka</option>
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
                            <button class="btn" onclick="doctorObject.searchDoctor()"><i class="fas fa-search"></i> Search</button>
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
                            <div class="doctor-name  col-md-3">
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
                <div class="add-bottom-left-823x115" style="position: relative;">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-13.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="add-inner-page-top-right-340x350">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-18.png" alt="add" class="img-fluid"></a>
                </div>
                <div class="sidebar-news">
                    <h4 class="title">JOB CIRCULAR</h4>
                    <ul class="list-inline">
                        <li><a href="">Sales Representative - Square Pharma</a></li>
                        <li><a href="">Area Manager - Navana Pharma</a></li>
                        <li><a href="">Accounts Officer - AristoPharma </a></li>
                        <li><a href="">Sales Representative - Square Pharma</a></li>
                        <li><a href="">Area Manager - Navana Pharma</a></li>
                        <a href="<?php echo site_url('Job/getAllJobInformation')?>" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="sidebar-news">
                    <h4 class="title">LOCAL NEWS</h4>
                    <ul class="list-inline">
                        <li><a href="">Shahana first female pro-VC of BSMMU</a></li>
                        <li><a href="">Princess Maria spends time with special children</a></li>
                        <li><a href="">Health Campain organised by  AristoPharma</a></li>
                        <li><a href="">Annual Conference - Square Pharma</a></li>
                        <a href="<?php echo site_url('LocalNews/getAllLocalNews')?>" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="sidebar-news">
                    <h4 class="title">INTERNATIONAL HEALTH</h4>
                    <ul class="list-inline">
                        <li><a href="">800 Canadian doctors protest pay raises,  .......</a></li>
                        <li><a href="">Global campaign takes aim at tobacco ........</a></li>
                        <li><a href="">Thyroid removal linked to increased bone-......</a></li>
                        <li><a href="">Heart disease patients live longer when ........</a></li>
                        <a href="" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="sidebar-news">
                    <h4 class="title">IMPORTANT ADDRESSES</h4>
                    <ul class="list-inline">
                        <li><a href="">24 Hours Pharmacies</a></li>
                        <li><a href="">Ambulance Services</a></li>
                        <li><a href="">Bangladesh Pharmaceuticals Companies web link</a></li>
                        <li><a href="">Blood Banks</a></li>
                        <li><a href="">Cancer Hospitals</a></li>
                        <li><a href="">Cardiac Hospitals</a></li>
                        <li><a href="">Eye Banks</a></li>
                        <a href="<?php echo site_url('ImportantAddress/getAllImportantAddress')?>" class="btn btn-s float-right">
                            <i class="fas fa-chevron-right"></i> see more
                        </a>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="speacial-reports">
                    <h3 class="title">Special Reports</h3>
                    <div class="media">
                        <img class="mr-3" src="<?php echo base_url().'application/views/';?>img/img-8.png" alt="image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="">High sugar intake in pregnancy may raise childhood allergy risk</a></h5>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3" src="<?php echo base_url().'application/views/';?>img/img-7.png" alt="image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="">High sugar intake in pregnancy may raise childhood allergy risk</a></h5>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3" src="<?php echo base_url().'application/views/';?>img/img-8.png" alt="image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="">High sugar intake in pregnancy may raise childhood allergy risk</a></h5>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3" src="<?php echo base_url().'application/views/';?>img/img-7.png" alt="image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="">High sugar intake in pregnancy may raise childhood allergy risk</a></h5>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3" src="<?php echo base_url().'application/views/';?>img/img-8.png" alt="image">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="">High sugar intake in pregnancy may raise childhood allergy risk</a></h5>
                        </div>
                    </div>
                    <a href="" class="btn btn-s float-right">
                        <i class="fas fa-chevron-right"></i> see more
                    </a>
                    <div class="clearfix"></div>
                </div>
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
