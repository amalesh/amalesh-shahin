<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/home');
        $this->load->view('front-end/footer');
    }
}