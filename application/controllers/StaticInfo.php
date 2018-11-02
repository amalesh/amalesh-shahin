<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class StaticInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function showAboutUs()
    {
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/about-us', array());
        $this->load->view('js/frontend-staticinfo-script');
        $this->load->view('front-end/footer');
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}