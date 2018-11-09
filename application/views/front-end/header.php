<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:30 PM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MiMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">
    <!------Font Awesome Css------>
    <!-- CDN -->
    <!-- stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"  crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

    <!-- scripts -->
    <script src="<?php echo base_url().'application/views/';?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url().'application/views/';?>js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="<?php echo base_url().'application/views/';?>js/common-script.js"></script>
    <script src="<?php echo base_url().'application/views/';?>js/popup-script.js"></script>
    <script src="<?php echo base_url().'application/views/';?>js/ajax-call.js"></script>

    <!------Main Css------>
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/imageviewer.css">
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/fonts/fonts.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/base.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light justify-content-between home-top-nav">
    <button class="navbar-toggler menu-btn no-outline" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" id="navbarMenuButton">
        <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand-centered" href="<?php echo site_url()?>">
        <img id="logo" src="<?php echo base_url().'application/views/';?>images/green-logo.png" alt="">
    </a>

    <button class="navbar-toggler menu-btn no-outline" type="button" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navigation" id="navbarSearchButton">
        <i class="fas fa-search"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
        <div class="container d-flex justify-content-between navbar-container">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 main-menu">
                <li id="mainMenuHome" class="nav-item">
                    <a class="nav-link mims-nav-link home-link" href="<?php echo site_url();?>">Home</a>
                </li>
                <li id="mainMenuDoctor" class="nav-item">
                    <a class="nav-link mims-nav-link doctor-link" href="<?php echo site_url('Doctor/getAllDoctorInformation');?>">Doctor</a>
                </li>
            </ul>
            <ul class="navbar-nav main-menu">
                <li class="nav-item" id="mainMenuResource">
                    <a class="nav-link mims-nav-link resources-link" href="<?php echo site_url('Resource/getAllActiveResourceInformation');?>">Resources</a>
                </li>
                <li class="nav-item" id="mainMenuAbout">
                    <a class="nav-link mims-nav-link about-link" href="<?php echo site_url('StaticInfo/showAboutUs');?>">About Us</a>
                </li>
            </ul>
            <div class="left-links">
                <a href="#" class="side-link"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="side-link"><i class="fab fa-twitter-square"></i></a>
                <a href="#" class="side-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="side-link"><i class="fab fa-google-plus-square"></i></a>
            </div>
            <div class="right-links">
                <a href="#" class="side-link"><i class="fas fa-user-circle"></i></a>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSearch">
        <div class="navbar-search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn theme-btn" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="search-category-radio">
                <div class="custom-control custom-radio">
                    <input type="radio" id="brand" name="search-category" value="brand" class="custom-control-input" checked>
                    <label class="custom-control-label" for="brand">Brand</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="generic" name="search-category" value="generic" class="custom-control-input">
                    <label class="custom-control-label" for="generic">Generic</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="indication" name="search-category" value="indication" class="custom-control-input">
                    <label class="custom-control-label" for="indication">Indication</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="manufacture" name="search-category" value="manufacture" class="custom-control-input">
                    <label class="custom-control-label" for="manufacture">Manufacture</label>
                </div>
                <p class="alphabets nav-aldphabets">
                    <a href="#" class="alphabet-link">A</a>
                    <a href="#" class="alphabet-link">B</a>
                    <a href="#" class="alphabet-link">C</a>
                    <a href="#" class="alphabet-link">D</a>
                    <a href="#" class="alphabet-link">E</a>
                    <a href="#" class="alphabet-link">F</a>
                    <a href="#" class="alphabet-link">G</a>
                    <a href="#" class="alphabet-link">H</a>
                    <a href="#" class="alphabet-link">I</a>
                    <a href="#" class="alphabet-link">J</a>
                    <a href="#" class="alphabet-link">K</a>
                    <a href="#" class="alphabet-link">L</a>
                    <a href="#" class="alphabet-link">M</a>
                    <a href="#" class="alphabet-link">N</a>
                    <a href="#" class="alphabet-link">O</a>
                    <a href="#" class="alphabet-link">P</a>
                    <a href="#" class="alphabet-link">Q</a>
                    <a href="#" class="alphabet-link">R</a>
                    <a href="#" class="alphabet-link">S</a>
                    <a href="#" class="alphabet-link">T</a>
                    <a href="#" class="alphabet-link">U</a>
                    <a href="#" class="alphabet-link">V</a>
                    <a href="#" class="alphabet-link">W</a>
                    <a href="#" class="alphabet-link">X</a>
                    <a href="#" class="alphabet-link">Y</a>
                    <a href="#" class="alphabet-link">Z</a>
                </p>
            </div>
        </div>
    </div>
</nav>
