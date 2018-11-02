<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<!-- banner -->
<div class="banner banner-small d-md-flex d-none">
    <div class="search-wrapper">
        <ul class="search-tabs group">
            <li class="brand active"><a onclick="drugObject.changeSearchOption('brand')" class="search_option_type search_by_brand">Brand</a></li>
            <li class="generic"><a onclick="drugObject.changeSearchOption('generic')" class="search_option_type search_by_generic">Generic</a></li>
            <li class="indication"><a onclick="drugObject.changeSearchOption('indication')" class="search_option_type search_by_indication">Indication</a></li>
            <li class="manufacture"><a onclick="drugObject.changeSearchOption('manufacturer')" class="search_option_type search_by_manufacturer">Manufacture</a></li>
        </ul>
        <div class="search">
            <input class="search-bar no-outline" type="text" id="searchDrugOption">
            <button class="search-btn no-outline" onclick="drugObject.searchBrandInformation()" id="searchInformation"><img src="<?php echo base_url().'application/views/';?>images/icons/magnifying-glass.svg" class="search-icon" alt=""></button>
        </div>
        <div class="alphabets">
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=a');?>" class="alphabet-link">A</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=b');?>" class="alphabet-link">B</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=c');?>" class="alphabet-link">C</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=d');?>" class="alphabet-link">D</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=e');?>" class="alphabet-link">E</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=f');?>" class="alphabet-link">F</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=g');?>" class="alphabet-link">G</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=h');?>" class="alphabet-link">H</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=i');?>" class="alphabet-link">I</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=j');?>" class="alphabet-link">J</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=k');?>" class="alphabet-link">K</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=l');?>" class="alphabet-link">L</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=m');?>" class="alphabet-link">M</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=n');?>" class="alphabet-link">N</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=o');?>" class="alphabet-link">O</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=p');?>" class="alphabet-link">P</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=q');?>" class="alphabet-link">Q</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=r');?>" class="alphabet-link">R</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=s');?>" class="alphabet-link">S</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=t');?>" class="alphabet-link">T</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=u');?>" class="alphabet-link">U</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=v');?>" class="alphabet-link">V</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=w');?>" class="alphabet-link">W</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=x');?>" class="alphabet-link">X</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=y');?>" class="alphabet-link">Y</a>
            <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic_by_alphabetically&Value=z');?>" class="alphabet-link">Z</a>
        </div>
    </div>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert generic-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert generic-advert-top-right">
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
                <div class="brand-details">
                    <h2 class="brand-title" ><?php echo $GenericData[0]['Name'];?></h2>
                    <div class="brand-info-table">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="brand-info-title">Generic Name</td>
                                <td>: <?php echo $GenericData[0]['Name'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Drug Class</td>
                                <td>: <?php echo $GenericData[0]['Classification'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Safety Remarks</td>
                                <td>: <?php echo $GenericData[0]['SafetyRemark'];?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="brand-description">
                        <div class="brand-description-point">
                            <p class="brand-description-title">Indication</p>
                            <p class="brand-description-text"><?php echo $GenericData[0]['Indication'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Dosage & Administration</p>
                            <p class="brand-description-text"><?php echo $GenericData[0]['DosageAdministration'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Contraindication & Precaution</p>
                            <p class="brand-description-text"><?php echo $GenericData[0]['ContraindicationPrecaution'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Side Effect</p>
                            <p class="brand-description-text"><?php echo $GenericData[0]['SideEffect'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Use in Pregnancy & Lactation</p>
                            <p class="brand-description-text"><?php echo $GenericData[0]['PregnancyLactation'];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-section main" style="margin-top: 15px">
                <!-- more jobs -->
                <div class="section-header own-pad" style="margin-bottom: 10px; padding: 24px 30px 16px 30px;">
                    Brand of <?php echo $GenericData[0]['Name'];?>
                </div>
                <div class="brand-generic-table brand-of-generic">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Manufacturer Name</th>
                        </tr>
                        </thead>
                        <tbody>
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
                </div>
            </div>
            <div class="in-page-advert generic-advert-bottom">
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
                    <div class="in-page-advert side-col generic-sidebar-advert">
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
    frontendCommonMethods.getAdvertisement(['generic-sidebar-advert', ' generic-advert-top-left', ' generic-advert-top-right', ' generic-advert-bottom']);
    drugObject.searchOptionType = '<?php echo $OptionType;?>';
    drugObject.searchOptionValue = '<?php echo $OptionValue;?>';
    //drugObject.perPageInformationNumber = <?php //echo $PerPageInformationNumber;?>//;
    //drugObject.totalDrug = <?php //echo isset($TotalBrand) ? $TotalBrand : 0;?>//;
    //drugObject.populatePagination('search-genetic-pagination', 1);
    drugObject.getAllDrugInfoForAutoComplete('generic');
</script>