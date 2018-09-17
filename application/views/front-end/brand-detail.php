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
                <div class="product-add-3">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-11.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-add-4">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-11.png" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="product-details">
                    <h4 class="title"><a href="<?php echo site_url('Brand/searchBrandInformation?Type=brand&Value='.$BrandDetail['Name'])?>"><?php echo $BrandDetail['Name'];?></a></h4>
                    <div class="product-info">
                        <p><b>Manufacturer :  </b><a href="<?php echo site_url('Brand/searchBrandInformation?Type=manufacturer&Value='.$BrandDetail['ManufacturerName'])?>"><?php echo $BrandDetail['ManufacturerName'];?></a></p>
                        <p><b>Generic Name :</b><a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&Value='.$BrandDetail['GenericName'])?>"><?php echo $BrandDetail['GenericName'];?></a></p>
                        <p><b>Drug Class :</b><?php echo $BrandDetail['Classification'];?></p>
                        <p><b>Dosage Form: </b><?php echo $BrandDetail['DosageForm'];?></p>
                        <p><b>Strength: </b><?php echo $BrandDetail['StrengthName'];?></p>
                        <p><b>Pack Size: </b><?php echo $BrandDetail['PackSize'];?></p>
                        <p><b>Price: </b><?php echo $BrandDetail['PriceInBDT'];?> Tk</p>
                        <p><b>Safety Remarks: </b><?php echo $BrandDetail['SafetyRemark'];?></p>
                        <p><b>Indications: </b><?php echo $BrandDetail['Indication'];?></p>
                        <p><b>Dosage & Administration :</b><?php echo $BrandDetail['DosageForm'];?></p>
                        <p><b>Contraindication & Precaution :</b><?php echo $BrandDetail['ContraindicationPrecaution'];?></p>
                        <p><b>Side effect:</b><?php echo $BrandDetail['SideEffect'];?></p>
                        <p><b>Use in Pregnancy & Lactation :</b><?php echo $BrandDetail['PregnancyLactation'];?></p>

                    </div>
                </div>
                <div class="product-add-5">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-13.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-add-2">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-12.png" alt="add" class="img-fluid"></a>
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
                    <a href="" class="btn btn-s float-right" style="margin-right: 26%;">
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
