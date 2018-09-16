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
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-14.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-add-4">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-15.png" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="presentation">
                    <h4><?php echo $AllBrands[0]['Name'];?></h4>
                    <div class="brand-generic-detail">
                        <p><b>Generic Name: </b><a href="<?php echo site_url('Generic/showGenericDetail?GenericID='.$AllBrands[0]['GenericID']);?>"><?php echo $AllBrands[0]['GenericName'];?></a></p>
                        <p><b>Drug Class: </b><?php echo $AllBrands[0]['Classification'];?></p>
                        <p><b>Safety Remarks: </b><?php echo $AllBrands[0]['SafetyRemark'];?></p>
                        <p><b>Indication: </b><?php echo $AllBrands[0]['Indication'];?></p>
                        <p><b>Dosage & Administration: </b><?php echo $AllBrands[0]['DosageAdministration'];?></p>
                        <p><b>Contraindication & Precaution: </b><?php echo $AllBrands[0]['ContraindicationPrecaution'];?></p>
                        <p><b>Side Effect: </b><?php echo $AllBrands[0]['SideEffect'];?></p>
                        <p><b>Use in Pregnancy & Lactation: </b><?php echo $AllBrands[0]['PregnancyLactation'];?></p>
                    </div>
                    <div class="presentation-table">
                        <table class="table" id="product-list">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 150px;">Brand Name</th>
                                <th scope="col">Dosage Form</th>
                                <th scope="col">Strength</th>
                                <th scope="col">Pack Size</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody class="drug-list">
                            <?php
                            foreach ($AllBrands AS $brand) {
                                echo '<tr>';
                                echo '<td><a href="'.site_url('Brand/showBrandDetail').'?BrandID='.$brand['ID'].'">'.$brand['Name'].'</a></td>';
                                echo '<td>'.$brand['DosageForm'].'</td>';
                                echo '<td>'.$brand['StrengthName'].'</td>';
                                echo '<td>'.$brand['PackSize'].'</td>';
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
                <div class="product-add-5" style="position: relative;">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-16.png" alt="" class="img-fluid"></a>
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
<script>
    frontendCommonMethods.getSideBarData();
    drugObject.populatePagination(1);
</script>