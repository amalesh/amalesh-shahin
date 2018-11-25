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
            <div class="in-page-advert indication-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert indication-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="content-section main" style="margin-top: 15px">
                <!-- more jobs -->
                <div class="section-header own-pad" style="margin-bottom: 10px; padding: 24px 30px 16px 30px;">
                    Generic of <?php echo $Indication;?>
                </div>
                <div class="brand-indication-table brand-of-generic">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Generic Name</th>
                        </tr>
                        </thead>
                        <tbody class="indication-list">
                        <?php
                        foreach ($AllIndications AS $brand) {
                            echo '<tr>';
                            echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=generic&Value='.$brand['Name']).'">'.$brand['Name'].'</a></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="search-indication-pagination"></ul>
            </nav>
            <div class="in-page-advert indication-advert-bottom">
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
                    <div class="in-page-advert side-col indication-sidebar-advert">
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
    frontendCommonMethods.getCommonAdvertisement(['indication-sidebar-advert', 'indication-advert-top-left', 'indication-advert-top-right', 'indication-advert-bottom']);
    drugObject.searchOptionType = '<?php echo $OptionType;?>';
    drugObject.searchOptionValue = '<?php echo $OptionValue;?>';
    drugObject.perPageInformationNumber = <?php echo $PerPageInformationNumber;?>;
    drugObject.totalDrug = <?php echo isset($TotalBrand) ? $TotalBrand : 0;?>;
    drugObject.populatePagination('search-indication-pagination', 1);
    drugObject.getAllDrugInfoForAutoComplete('indication');
</script>