<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Resource extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ResourceInformation_model');
    }

    public function getAllActiveResourceInformation()
    {
        $all_resource_information = $this->ResourceInformation_model->getAllActiveResourceInformation();
        $data = array();
        $data['AllResources'] = $all_resource_information;
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        //$this->load->view('front-end/main-menu');
        $this->load->view('front-end/resource-list', $data);
        $this->load->view('js/frontend-resource-script');
        $this->load->view('front-end/footer');
    }

    public function getAllActiveResource()
    {
        $all_resource_information = $this->ResourceInformation_model->getAllActiveResourceInformation();
        $this->sendRestAPIResponse($all_resource_information);
    }

    public function getResourceDetail()
    {
        $resource_information = $this->ResourceInformation_model->getResourceDetail();
        $data = array();
        $data['resource'] = $resource_information;
        $this->load->view('front-end/resource-viewer-pdf', $data);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}