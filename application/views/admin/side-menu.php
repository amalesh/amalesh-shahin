<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/17/2018
 * Time: 10:01 PM
 */
?>
</head>

<body>

<section id="container" >
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="<?php echo site_url('Product/getProductListForAdmin')?>" class="logo">
                <img src="<?php echo base_url()?>application/views/images/logo.png" alt="">
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
    </header>
    <!--header end-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-laptop"></i>
                            <span>General Data</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo site_url('Generic/getGenericListForAdmin')?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Generic</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Brand/getBrandListForAdmin')?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Manufacturer/getManufacturerListForAdmin')?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Manufacturer</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('DosageForm/getDosageFormListForAdmin')?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Dosage Form</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Strength/getStrengthListForAdmin')?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Strength</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('PackSize/getPackSizeListForAdmin')?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Pack Size</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Doctor/getDoctorListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Doctor</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Job/getJobListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Job</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('News/getNewsListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>News</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Address/getAddressListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Address</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Advertisement/getAdvertisementListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Advertisement</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('SpecialReports/getSpecialReportsListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Special Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('InternationalHealth/getInternationalHealthListForAdmin')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>International Health</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('User/logout')?>">
                            <i class="fa fa-dashboard"></i>
                            <span>logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
