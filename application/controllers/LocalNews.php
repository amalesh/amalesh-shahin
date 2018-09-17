<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class LocalNews extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('BrandInformation_model');
    }

    public function getAllLocalNews()
    {
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('front-end/local-news');
        $this->load->view('front-end/footer');
    }

    public function getLocalNewsDetail()
    {
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('front-end/local-news-detail');
        $this->load->view('front-end/footer');
    }
}