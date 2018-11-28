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
            <a onclick="drugObject.searchAlphabetically('a')" class="alphabet-link">A</a>
            <a onclick="drugObject.searchAlphabetically('b')" class="alphabet-link">B</a>
            <a onclick="drugObject.searchAlphabetically('c')" class="alphabet-link">C</a>
            <a onclick="drugObject.searchAlphabetically('d')" class="alphabet-link">D</a>
            <a onclick="drugObject.searchAlphabetically('e')" class="alphabet-link">E</a>
            <a onclick="drugObject.searchAlphabetically('f')" class="alphabet-link">F</a>
            <a onclick="drugObject.searchAlphabetically('g')" class="alphabet-link">G</a>
            <a onclick="drugObject.searchAlphabetically('h')" class="alphabet-link">H</a>
            <a onclick="drugObject.searchAlphabetically('i')" class="alphabet-link">I</a>
            <a onclick="drugObject.searchAlphabetically('j')" class="alphabet-link">J</a>
            <a onclick="drugObject.searchAlphabetically('k')" class="alphabet-link">K</a>
            <a onclick="drugObject.searchAlphabetically('l')" class="alphabet-link">L</a>
            <a onclick="drugObject.searchAlphabetically('m')" class="alphabet-link">M</a>
            <a onclick="drugObject.searchAlphabetically('n')" class="alphabet-link">N</a>
            <a onclick="drugObject.searchAlphabetically('o')" class="alphabet-link">O</a>
            <a onclick="drugObject.searchAlphabetically('p')" class="alphabet-link">P</a>
            <a onclick="drugObject.searchAlphabetically('q')" class="alphabet-link">Q</a>
            <a onclick="drugObject.searchAlphabetically('r')" class="alphabet-link">R</a>
            <a onclick="drugObject.searchAlphabetically('s')" class="alphabet-link">S</a>
            <a onclick="drugObject.searchAlphabetically('t')" class="alphabet-link">T</a>
            <a onclick="drugObject.searchAlphabetically('u')" class="alphabet-link">U</a>
            <a onclick="drugObject.searchAlphabetically('v')" class="alphabet-link">V</a>
            <a onclick="drugObject.searchAlphabetically('w')" class="alphabet-link">W</a>
            <a onclick="drugObject.searchAlphabetically('x')" class="alphabet-link">X</a>
            <a onclick="drugObject.searchAlphabetically('y')" class="alphabet-link">Y</a>
            <a onclick="drugObject.searchAlphabetically('z')" class="alphabet-link">Z</a>
        </div>
    </div>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert brand-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert brand-advert-top-right">
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
                    <h2 class="brand-title" ><?php echo $BrandDetail['Name'];?></h2>
                    <div class="brand-info-table">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="brand-info-title">Generic Name</td>
                                <td style="color: blue">: <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&Value='.$BrandDetail['GenericName']);?>"><?php echo $BrandDetail['GenericName'];?></a></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Manufacturer Name</td>
                                <td style="color: blue">: <a href="<?php echo site_url('Brand/searchBrandInformation?Type=manufacturer&Value='.$BrandDetail['ManufacturerName'])?>"><?php echo $BrandDetail['ManufacturerName'];?></a></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Drug Class</td>
                                <td>: <?php echo $BrandDetail['Classification'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Safety Remarks</td>
                                <td>: <?php echo $BrandDetail['SafetyRemark'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Dosage Form</td>
                                <td>: <?php echo $BrandDetail['DosageForm'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Strength Name</td>
                                <td>: <?php echo $BrandDetail['StrengthName'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Pack Size</td>
                                <td>: <?php echo $BrandDetail['PackSize'];?></td>
                            </tr>
                            <tr>
                                <td class="brand-info-title">Price in BDT</td>
                                <td>: <?php echo $BrandDetail['PriceInBDT'];?> Tk</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="brand-description">
                        <div class="brand-description-point">
                            <p class="brand-description-title">Indication</p>
                            <p class="brand-description-text"><?php echo $BrandDetail['Indication'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Dosage & Administration</p>
                            <p class="brand-description-text"><?php echo $BrandDetail['DosageAdministration'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Contraindication & Precaution</p>
                            <p class="brand-description-text"><?php echo $BrandDetail['ContraindicationPrecaution'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Side Effect</p>
                            <p class="brand-description-text"><?php echo $BrandDetail['SideEffect'];?></p>
                        </div>
                        <div class="brand-description-point">
                            <p class="brand-description-title">Use in Pregnancy & Lactation</p>
                            <p class="brand-description-text"><?php echo $BrandDetail['PregnancyLactation'];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="in-page-advert brand-advert-bottom">
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
                    <div class="in-page-advert side-col brand-sidebar-advert">
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
    frontendCommonMethods.getCommonAdvertisement(['brand-sidebar-advert', 'brand-advert-top-left', 'brand-advert-top-right', 'brand-advert-bottom']);
    drugObject.getAllDrugInfoForAutoComplete('brand');
</script>