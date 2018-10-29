<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/login');
        $this->load->view('js/admin-user-script');
        $this->load->view('admin/footer');
    }

    public function register()
    {
        $this->load->view('admin/registration');
    }

    public function userLogin () {
        $login_status = array(
            'success' => 0
        );
        $user_info = $this->User_model->getUserInformation();
        if (isset($user_info['ID'])) {
            $array = array(
                'user_id' => $user_info['ID'],
                'user_email' => strtolower($user_info['UserName']),
                'user_pass' => $user_info['UserPass'],
                'user_role_id' => $user_info['RoleID']
            );
            $this->session->set_tempdata($array, NULL, config_item('session_expiry_time'));
            $login_status['success'] = 1;
        }

        $this->sendRestAPIResponse($login_status);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('User/login');
    }

    public function incrementVisitorCount() {
        $return = $this->User_model->incrementVisitorCount();
        $this->sendRestAPIResponse($return);
    }

    public function getNumberOfVisitor() {
        $total_visitor = $this->User_model->getNumberOfVisitor();
        $this->sendRestAPIResponse($total_visitor);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}