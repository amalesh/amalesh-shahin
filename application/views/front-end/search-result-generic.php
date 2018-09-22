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
                <ul class="rslides add-generic-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-generic-page-inner-right-523x52"></ul>
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
                    <h4><?php echo $GenericData[0]['Name'];?></h4>
                    <div class="brand-generic-detail">
                        <p><b>Generic Name: </b><?php echo $GenericData[0]['Name'];?></p>
                        <p><b>Drug Class: </b><?php echo $GenericData[0]['Classification'];?></p>
                        <p><b>Safety Remarks: </b><?php echo $GenericData[0]['SafetyRemark'];?></p>
                        <p><b>Indication: </b><?php echo $GenericData[0]['Indication'];?></p>
                        <p><b>Dosage & Administration: </b><?php echo $GenericData[0]['DosageAdministration'];?></p>
                        <p><b>Contraindication & Precaution: </b><?php echo $GenericData[0]['ContraindicationPrecaution'];?></p>
                        <p><b>Side Effect: </b><?php echo $GenericData[0]['SideEffect'];?></p>
                        <p><b>Use in Pregnancy & Lactation: </b><?php echo $GenericData[0]['PregnancyLactation'];?></p>
                    </div>
                    <div class="presentation-table">
                        <h1>Brand of <?php echo $GenericData[0]['Name'];?></h1>
                        <table class="table" id="product-list">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 150px;">Brand Name</th>
                                <th scope="col">Manufacturer Name</th>
                            </tr>
                            </thead>
                            <tbody class="drug-list generic-list">
                            <?php
                            foreach ($BrandData AS $brand) {
                                echo '<tr>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=brand&Value='.$brand['Name']).'">'.$brand['Name'].'</a></td>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=manufacturer&Value='.$brand['ManufacturerName']).'">'.$brand['ManufacturerName'].'</a></td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="search-genetic-pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-generic-page-bottom-left-823x115"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="rslides add-generic-page-top-right-340x355"></ul>
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
    frontendCommonMethods.getAdvertisement(['add-generic-page-top-right-340x355', 'add-generic-page-bottom-left-823x115', 'add-generic-page-inner-left-523x52', 'add-generic-page-inner-right-523x52']);
    drugObject.searchOptionType = '<?php echo $OptionType;?>';
    drugObject.searchOptionValue = '<?php echo $OptionValue;?>';
    drugObject.perPageInformationNumber = <?php echo $PerPageInformationNumber;?>;
    drugObject.totalDrug = <?php echo isset($TotalBrand) ? $TotalBrand : 0;?>;
    drugObject.populatePagination('search-genetic-pagination', 1);
    drugObject.getAllDrugInfoForAutoComplete();
    drugObject.changeSearchOption('generic');
</script>