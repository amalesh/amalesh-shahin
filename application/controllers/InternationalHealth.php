<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class InternationalHealth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InternationalHealth_model');
    }

    public function getAllInternationalHealth() {
        $data = array();
        list($data['AllInternationalHealth'], $data['TotalInternationalHealth']) = $this->InternationalHealth_model->getAllActiveInternationalHealth();
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        //$this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-international-health-script');
        $this->load->view('front-end/international-health', $data);
        $this->load->view('front-end/footer');
    }

    public function getInternationalHealthForHomePage() {
        $all_international_health = $this->InternationalHealth_model->getInternationalHealthForSidebar();
        $this->sendRestAPIResponse($all_international_health);
    }

    public function showIndividualInternationalHealthDetail() {
        $data = array();
        $international_health = $this->InternationalHealth_model->getIndividualInternationalHealthDetail();
        list($data['AllInternationalHealth'], $data['TotalInternationalHealth']) = $this->InternationalHealth_model->getAllActiveInternationalHealth();
        $data['InternationalHealthInfo'] = $international_health;
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        //$this->load->view('front-end/main-menu');
        $this->load->view('front-end/international-health-detail', $data);
        $this->load->view('front-end/footer');
    }

    public function getInternationalHealthListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_international_health = $this->InternationalHealth_model->getAllInternationalHealth();
        $data = array();
        $data['AllInternationalHealths'] = $all_international_health;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/international-health', $data);
        $this->load->view('js/admin-international-health-script');
        $this->load->view('admin/footer');
    }

    public function addInternationalHealth() {
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

        $return = $this->InternationalHealth_model->createInternationalHealth($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateInternationalHealth() {
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

        $return = $this->InternationalHealth_model->updateInternationalHealth($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllInternationalHealths() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $all_international_health = $this->InternationalHealth_model->getAllInternationalHealth();
        $this->sendRestAPIResponse($all_international_health);
    }

    public function getInternationalHealthDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $international_health_detail = $this->InternationalHealth_model->getInternationalHealthDetail();
        $this->sendRestAPIResponse($international_health_detail);
    }

    public function deleteInternationalHealth() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->InternationalHealth_model->deleteInternationalHealth();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}