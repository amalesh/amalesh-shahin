<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Address extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AddressInformation_model');
        $this->load->model('Location_model');
    }

    public function getAllImportantAddress() {
        $this->load->view('front-end/header');
        $this->load->view('front-end/main-menu');
        $this->load->view('front-end/important-addresses');
        $this->load->view('front-end/footer');
    }

    public function getAllExistingLocation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_existing_location = $this->Location_model->getAllExistingLocation();
        $this->sendRestAPIResponse($all_existing_location);
    }

    public function getAllLocationDate() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_country = $this->AddressInformation_model->getAllCountry();
        $all_state = $this->AddressInformation_model->getAllState();
        $all_city = $this->AddressInformation_model->getAllCity();
        $data = array(
            'AllCountry' => $all_country,
            'AllState' => $all_state,
            'AllCity' => $all_city
        );
        $this->sendRestAPIResponse($data);
    }

    public function getAddressListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_address_information = $this->AddressInformation_model->getAllAddressInformation();
        $data = array();
        $data['AllAddress'] = $all_address_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/address', $data);
        $this->load->view('js/admin-address-script');
        $this->load->view('admin/footer');
    }

    public function addAddress() {
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

        $return = $this->AddressInformation_model->createAddressInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateAddress() {
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

        $return = $this->AddressInformation_model->updateAddressInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllAddressCategories() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->getAllAddressCategories($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function getAllAddressInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->getAllAddressInformation($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function getAddressDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->getAddressDetail();
        $this->sendRestAPIResponse($return);
    }

    public function deleteAddress() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->deleteAddress();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}