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
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-brand-page-bottom-left-823x115"></ul>
                    </div>
                </div>
            </div>
            <ul class="col-md-4">
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
                    <ul class="list-inline"></ul>
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
</script>