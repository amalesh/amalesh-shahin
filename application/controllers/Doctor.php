<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DoctorInformation_model');
    }

    public function getAllDoctorInformation()
    {
        $data = array();
        list($data['AllDoctors'], $data['TotalDoctor']) = $this->DoctorInformation_model->getAllActiveDoctorInformation();
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-doctor-script');
        $this->load->view('front-end/doctor', $data);
        $this->load->view('front-end/footer');
    }

    public function search() {
        $doctorSearchBy = $this->input->get('doctorSearchBy');
        $doctorLocation = $this->input->get('doctorLocation');
        $doctorGender = $this->input->get('doctorGender');

        $data = array();
        list($data['AllDoctors'], $data['TotalDoctor']) = $this->DoctorInformation_model->search($doctorSearchBy, $doctorLocation, $doctorGender);
        $this->sendRestAPIResponse($data);
    }

    public function getDoctorListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_doctor_information = $this->DoctorInformation_model->getAllDoctorInformation();
        $data = array();
        $data['AllDoctors'] = $all_doctor_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/doctor', $data);
        $this->load->view('js/admin-doctor-script');
        $this->load->view('admin/footer');
    }

    public function addDoctor() {
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

        $return = $this->DoctorInformation_model->createDoctorInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateDoctor() {
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

        $return = $this->DoctorInformation_model->updateDoctorInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllDoctors() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $all_doctor_information = $this->DoctorInformation_model->getAllDoctorInformation();
        $this->sendRestAPIResponse($all_doctor_information);
    }

    public function getDoctorDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $doctor_detail_information = $this->DoctorInformation_model->getDoctorDetailInformation();
        $this->sendRestAPIResponse($doctor_detail_information);
    }

    public function deleteDoctor() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->DoctorInformation_model->deleteDoctor();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}