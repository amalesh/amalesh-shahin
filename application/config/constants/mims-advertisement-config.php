<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('ADVERTISEMENT_POSITION_HOME_PAGE_TOP_LEFT', 'home-page-top-left');
define('ADVERTISEMENT_POSITION_HOME_PAGE_MIDDLE', 'home-page-middle');
define('ADVERTISEMENT_POSITION_HOME_PAGE_BOTTOM', 'home-page-bottom');
define('ADVERTISEMENT_POSITION_ALL_PAGE_BOTTOM', 'all-pages-bottom');

define('ADVERTISEMENT_NUMBER_HOME_PAGE_TOP_LEFT', 3);
define('ADVERTISEMENT_NUMBER_HOME_PAGE_MIDDLE', 1);
define('ADVERTISEMENT_NUMBER_HOME_PAGE_BOTTOM', 2);
define('ADVERTISEMENT_NUMBER_ALL_PAGE_BOTTOM', 2);

$config['advertisement_detail'] = array(
    'home' => array(
        array(ADVERTISEMENT_POSITION_HOME_PAGE_TOP_LEFT, ADVERTISEMENT_NUMBER_HOME_PAGE_TOP_LEFT),
        array(ADVERTISEMENT_POSITION_HOME_PAGE_MIDDLE, ADVERTISEMENT_NUMBER_HOME_PAGE_MIDDLE),
        array(ADVERTISEMENT_POSITION_HOME_PAGE_BOTTOM, ADVERTISEMENT_NUMBER_HOME_PAGE_BOTTOM)
    )
);