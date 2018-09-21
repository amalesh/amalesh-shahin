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
                <div class="add-brand-page-inner-left-523x52"></div>
            </div>
            <div class="col-md-6">
                <div class="add-brand-page-inner-right-523x52"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="search-bar search-bar-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a class="search_option_type search_by_brand" onclick="drugObject.changeSearchOption('brand')">Brand</a></li><span class="separator"></span>
                                <li class="list-inline-item"><a class="search_option_type search_by_generic" onclick="drugObject.changeSearchOption('generic')">Generic</a></li><span class="separator"></span>
                                <li class="list-inline-item"><a class="search_option_type search_by_indication" onclick="drugObject.changeSearchOption('indication')">Indication</a></li><span class="separator"></span>
                                <li class="list-inline-item"><a class="search_option_type search_by_manufacturer" onclick="drugObject.changeSearchOption('manufacturer')">Manufacturer</a></li>
                            </ul>
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="searchDrugOption">
                            <a onclick="drugObject.searchBrandInformation()" id="searchInformation" class="search-btn"><i class="fas fa-search"></i></a>
                            <span class="error_message invalid-search-option-error">Please enter a valid search option.</span>
                        </div>
                    </div>
                </div>
                <div class="presentation">
                    <h4><?php echo $AllBrands[0]['Name'];?></h4>
                    <div class="brand-generic-detail">
                        <p><b>Generic Name: </b><a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&Value='.$AllBrands[0]['GenericName']);?>"><?php echo $AllBrands[0]['GenericName'];?></a></p>
                        <p><b>Drug Class: </b><?php echo $AllBrands[0]['Classification'];?></p>
                        <p><b>Safety Remarks: </b><?php echo $AllBrands[0]['SafetyRemark'];?></p>
                        <p><b>Indication: </b><?php echo $AllBrands[0]['Indication'];?></p>
                        <p><b>Dosage & Administration: </b><?php echo $AllBrands[0]['DosageAdministration'];?></p>
                        <p><b>Contraindication & Precaution: </b><?php echo $AllBrands[0]['ContraindicationPrecaution'];?></p>
                        <p><b>Side Effect: </b><?php echo $AllBrands[0]['SideEffect'];?></p>
                        <p><b>Use in Pregnancy & Lactation: </b><?php echo $AllBrands[0]['PregnancyLactation'];?></p>
                    </div>
                    <div class="presentation-table">
                        <h4>Presentation</h4>
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
                            <ul class="pagination" id="search-drug-pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="add-brand-page-bottom-left-823x115"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="add-brand-page-top-right-340x355"></div>
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
    drugObject.searchOptionType = '<?php echo $OptionType;?>';
    drugObject.searchOptionValue = '<?php echo $OptionValue;?>';
    drugObject.perPageInformationNumber = <?php echo $PerPageInformationNumber;?>;
    drugObject.totalDrug = <?php echo isset($TotalBrand) ? $TotalBrand : 0;?>;
    drugObject.populatePagination('search-drug-pagination', 1);
    drugObject.getAllDrugInfoForAutoComplete();
    drugObject.changeSearchOption('brand');
</script>