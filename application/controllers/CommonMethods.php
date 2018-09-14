<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class CommonMethods extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('JobInformation_model');
        $this->load->model('NewsInformation_model');
        $this->load->model('AddressInformation_model');
        $this->load->model('SpecialReports_model');
    }

    public function getSideBarInformation()
    {
        $side_bar_information = array();
        $all_jobs = $this->JobInformation_model->getJobInformationForSidebar();
        $all_news = $this->NewsInformation_model->getNewsInformationForSidebar();
        $all_address = $this->AddressInformation_model->getAddressInformationForSidebar();
        $all_special_reports = $this->SpecialReports_model->getSpecialReportsForSidebar();
        $side_bar_information['AllJobs'] = $all_jobs;
        $side_bar_information['AllAddress'] = $all_address;
        $side_bar_information['AllNews'] = $all_news;
        $side_bar_information['AllSpecialReports'] = $all_special_reports;
        $this->sendRestAPIResponse($side_bar_information);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}