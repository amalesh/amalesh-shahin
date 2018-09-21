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
                    <h4>Brand of <?php echo $Manufacturer;?></h4>
                    <ul class="list-inline text-center alpha-list">
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-a"><a onclick="drugObject.getManufacturerBrand('a')">A</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-b"><a onclick="drugObject.getManufacturerBrand('b')">B</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-c"><a onclick="drugObject.getManufacturerBrand('c')">C</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-d"><a onclick="drugObject.getManufacturerBrand('d')">D</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-e"><a onclick="drugObject.getManufacturerBrand('e')">E</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-f"><a onclick="drugObject.getManufacturerBrand('f')">F</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-g"><a onclick="drugObject.getManufacturerBrand('g')">G</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-h"><a onclick="drugObject.getManufacturerBrand('h')">H</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-i"><a onclick="drugObject.getManufacturerBrand('i')">I</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-j"><a onclick="drugObject.getManufacturerBrand('j')">J</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-k"><a onclick="drugObject.getManufacturerBrand('k')">K</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-l"><a onclick="drugObject.getManufacturerBrand('l')">L</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-m"><a onclick="drugObject.getManufacturerBrand('m')">M</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-n"><a onclick="drugObject.getManufacturerBrand('n')">N</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-o"><a onclick="drugObject.getManufacturerBrand('o')">O</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-p"><a onclick="drugObject.getManufacturerBrand('p')">P</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-q"><a onclick="drugObject.getManufacturerBrand('q')">Q</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-r"><a onclick="drugObject.getManufacturerBrand('r')">R</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-s"><a onclick="drugObject.getManufacturerBrand('s')">S</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-t"><a onclick="drugObject.getManufacturerBrand('t')">T</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-u"><a onclick="drugObject.getManufacturerBrand('u')">U</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-v"><a onclick="drugObject.getManufacturerBrand('v')">V</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-w"><a onclick="drugObject.getManufacturerBrand('w')">W</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-x"><a onclick="drugObject.getManufacturerBrand('x')">X</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-y"><a onclick="drugObject.getManufacturerBrand('y')">Y</a></li>
                        <span class="separator"></span>
                        <li class="list-inline-item search-manufacturer-option search-manufacturer-option-z"><a onclick="drugObject.getManufacturerBrand('z')">Z</a></li>
                        <span class="separator"></span>

                    </ul>
                    <div class="presentation-table">
                        <table class="table" id="product-list">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 150px;">Brand Name</th>
                                <th scope="col">Generic Name</th>
                            </tr>
                            </thead>
                            <tbody class="manufacturer-list">
                            <?php
                            foreach ($AllManufacturers AS $brand) {
                                echo '<tr>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=brand&Value='.$brand['Name']).'">'.$brand['Name'].'</a></td>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=generic&Value='.$brand['GenericName']).'">'.$brand['GenericName'].'</a></td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="search-manufacturer-pagination"></ul>
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
    drugObject.searchOptionType = '<?php echo $OptionType;?>';
    drugObject.searchOptionValue = '<?php echo $OptionValue;?>';
    drugObject.perPageInformationNumber = <?php echo $PerPageInformationNumber;?>;
    drugObject.totalDrug = <?php echo isset($TotalBrand) ? $TotalBrand : 0;?>;
    drugObject.populatePagination('search-manufacturer-pagination', 1);
    drugObject.getAllDrugInfoForAutoComplete();
    drugObject.changeSearchOption('manufacturer');
</script>