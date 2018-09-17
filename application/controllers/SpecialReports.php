<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class SpecialReports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SpecialReports_model');
    }

    public function getAllLocalSpecialReports() {
        $all_special_reports = $this->SpecialReports_model->getAllActiveSpecialReports();
        $data = array();
        $data['AllSpecialReports'] = $all_special_reports;
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('front-end/local-special-reports', $data);
        $this->load->view('front-end/footer');
    }

    public function getSpecialReportsListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_specialreports_information = $this->SpecialReports_model->getAllSpecialReports();
        $data = array();
        $data['AllSpecialReportss'] = $all_specialreports_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/specialreports', $data);
        $this->load->view('js/admin-specialreports-script');
        $this->load->view('admin/footer');
    }

    public function addSpecialReports() {
        $response = array(
            'error_msg' => '',
            'result' => false
        );
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->SpecialReports_model->createSpecialReports($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateSpecialReports() {
        $response = array(
            'error_msg' => '',
            'result' => false
        );
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->SpecialReports_model->updateSpecialReports($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllSpecialReportss() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $all_specialreports_information = $this->SpecialReports_model->getAllSpecialReports();
        $this->sendRestAPIResponse($all_specialreports_information);
    }

    public function getSpecialReportsDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $specialreports_detail_information = $this->SpecialReports_model->getSpecialReportsDetailInformation();
        $this->sendRestAPIResponse($specialreports_detail_information);
    }

    public function deleteSpecialReports() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->SpecialReports_model->deleteSpecialReports();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}