<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Advertisement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdvertisementInformation_model');
        $this->load->model('AdvertisementPositionInformation_model');
    }

    public function getAdvertisement() {
        $all_advertisement = $this->AdvertisementInformation_model->getAdvertisement();
        $this->sendRestAPIResponse($all_advertisement);
    }

    public function getAdvertisementListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_advertisement_information = $this->AdvertisementInformation_model->getAllAdvertisementInformation();
        $data = array();
        $data['AllAdvertisement'] = $all_advertisement_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/advertisement', $data);
        $this->load->view('js/admin-advertisement-script');
        $this->load->view('admin/footer');
    }

    public function addAdvertisement() {
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

        $return = $this->AdvertisementInformation_model->createAdvertisementInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateAdvertisement() {
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

        $return = $this->AdvertisementInformation_model->updateAdvertisementInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllAdvertisementInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $all_advertisement_information = $this->AdvertisementInformation_model->getAllAdvertisementInformation();
        $this->sendRestAPIResponse($all_advertisement_information);
    }

    public function getAllAdvertisementPosition() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $all_advertisement_position_information = $this->AdvertisementPositionInformation_model->getAllAdvertisementPosition();
        $this->sendRestAPIResponse($all_advertisement_position_information);
    }

    public function getAdvertisementDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $advertisement_detail_information = $this->AdvertisementInformation_model->getAdvertisementDetailInformation();
        $this->sendRestAPIResponse($advertisement_detail_information);
    }

    public function deleteAdvertisement() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->AdvertisementInformation_model->deleteAdvertisement();
        $this->sendRestAPIResponse($return);
    }

    public function getPositionWiseAdvertisementInformation() {
        $return = $this->AdvertisementInformation_model->getPositionWiseAdvertisementInformation();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}