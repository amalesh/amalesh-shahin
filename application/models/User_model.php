<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */

require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/UserEntity.php';
require_once APPPATH.'libraries/VOs/UserVO.php';

class User_model extends GeneralData_model {
    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function userLogin($user_name, $user_pass) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = '';
        $role_id = '';

        $this->db->select('ID, RoleID');
        $this->db->get('userinformation');
        if (strpos($user_pass, '@')) {
            $this->db->where('EmailID', $user_name);
        } else {
            $this->db->where('UserName', $user_name);
        }
        $this->db->where('UserPass', md5($user_pass));
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        log_message('debug', __METHOD__.'#'.__LINE__.'SQL statement: '.$this->db->last_query());
        foreach ($query->result() as $row) {
            $user_id = $row->ID;
            $role_id = $row->RoleID;
        }

        return array($user_id, $role_id);
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function createUser() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('UserName', 'EmailID', 'UserPass', 'RoleID');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $check_require_field_erro;

        $data = array();
        $data['UserName'] = $this->input->post('UserName');
        $data['EmailID'] = $this->input->post('EmailID');
        $data['UserPass'] = $this->input->post('UserPass');
        $data['FirstName'] = $this->input->post('FirstName');
        $data['LastName'] = $this->input->post('LastName');
        $data['RoleID'] = $this->input->post('RoleID');

        $check_email_id = $this->checkEmailID($data['EmailID']);
        if ($check_email_id != NO_ERROR) {
            return $check_email_id;
        }

        $user_entity = new UserEntity($data);

        $user_data = $user_entity->getUserEntityForCreate();

        if (empty($user_data)) {
            return ERROR_INVALID_EMAIL_ID;
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('userinformation', $user_data)) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }
    }

    public function changePassword() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        $user_pass = $this->input->get('UserPass');
        if (!empty($user_id) && !empty($user_pass)) {
            $check_email_id = $this->checkEmailID($user_pass);
            if ($check_email_id != NO_ERROR) {
                return $check_email_id;
            }

            $this->db->set('UserPass', md5($user_pass));
            $this->db->where('ID', $user_id);
            if ($this->db->update('userinformation')) {
                return NO_ERROR;
            } else {
                return ERROR_UNKNOWN;
            }
        }

        return ERROR_INVALID_REQUEST;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getUserDetail() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        if ($user_id) {
            $user_detail = parent::getDetail('user', $user_id);
            if (empty($user_detail)) {
                return ERROR_INVALID_REQUEST;
            }

            $user_entity = new UserEntity($user_detail);
            return $user_entity->getUserEntity();
        }

        return ERROR_INVALID_REQUEST;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllUserDetail() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_information = parent::getAllActiveInformation();
        $all_user_information = array();
        $total = 0;
        foreach ($all_information AS $information) {
            $user_entity = new UserEntity($information);
            $all_user_information[$total++] = $user_entity->getUserEntity();
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_user_information;
    }

    public function getLoggedInUser() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $user_role = isset($_SESSION['user_role_id']) ? $_SESSION['user_role_id'] : '';
        $user_pass = isset($_SESSION['user_pass']) ? $_SESSION['user_pass'] : '';
        $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
        if ($user_id) {
            $array = array(
                'user_id' => $user_id,
                'user_email' => $user_email,
                'user_pass' => $user_pass,
                'user_role_id' => $user_role
            );
            $this->session->set_tempdata($array, NULL, config_item('session_expiry_time'));
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return array($user_id, $user_role);
    }

    public function isValidEmailForRegister() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $email_id = $this->input->get('EmailID');
        $this->db->select('ID');
        $this->db->get('userinformation');
        $this->db->where('EmailID', $email_id);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        return empty($user_detail) ? true : false;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function isValidUserNameForRegister() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_name = $this->input->get('UserName');
        $this->db->select('ID');
        $this->db->get('userinformation');
        $this->db->where('UserName', $user_name);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        return empty($user_detail) ? true : false;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function isValidUserNameForUpdate($networks, $name) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        if (empty($user_id)) {
            return false;
        }

        $user_name = $this->input->get('UserName');
        $this->db->select('ID');
        $this->db->get('userinformation');
        $this->db->where('ID !=', $user_id);
        $this->db->where('UserName', $user_name);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        return empty($user_detail) ? true : false;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function isValidEmailForUpdate() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        if (empty($user_id)) {
            return false;
        }

        $email_id = $this->input->get('EmailID');
        $this->db->select('ID');
        $this->db->get('userinformation');
        $this->db->where('ID !=', $user_id);
        $this->db->where('EmailID', strtolower($email_id));
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        return empty($user_detail) ? true : false;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function updateUserInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        if (empty($user_id)) {
            return false;
        }

        $data = array();
        $data['UserName'] = $this->input->post('UserName');
        $data['EmailID'] = $this->input->post('EmailID');
        $data['FirstName'] = $this->input->post('FirstName');
        $data['LastName'] = $this->input->post('LastName');
        $data['RoleID'] = $this->input->post('RoleID');

        $require_fields = array('UserName', 'EmailID', 'RoleID');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $check_require_field_erro;
        }

        $check_email_id = $this->checkEmailID($data['EmailID']);
        if ($check_email_id != NO_ERROR) {
            return $check_email_id;
        }

        $user_entity = new UserEntity($data);

        $user_data = $user_entity->getUserEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($user_data);
        $this->db->where('ID', $user_id);
        if($this->db->update('userinformation')) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return false;
    }

    public function deleteUserInformation() {
        return parent::deleteInformation('user');
    }

    public function getUserInformation() {
        $user_id = $this->input->get('UserID');
        $user_pass = $this->input->get('UserPass');
        $this->db->select('u.ID, u.UserName, u.EmailID, u.UserPass, u.RoleID');
        $this->db->from('userinformation as u');
        $this->db->where('u.UserName', strtolower($user_id));
        $this->db->where('u.UserPass', md5($user_pass));
        $this->db->where('u.IsActive', 1, false);
        $user_info = $this->db->get()->result_array();
//        echo $this->db->last_query();
        return isset($user_info[0]['ID']) ? $user_info[0] : array();
    }

    public function incrementVisitorCount() {
        $this->db->set('NymberOfVisitor', 'NymberOfVisitor + 1', FALSE);
        $this->db->limit(1);
        return $this->db->update('visitor');
    }

    public function getNumberOfVisitor() {
        $this->db->select('NymberOfVisitor');
        $this->db->from('visitor');
        $this->db->limit(1);
        $user_info = $this->db->get()->result_array();
//        echo $this->db->last_query();
        return isset($user_info[0]['NymberOfVisitor']) ? $user_info[0]['NymberOfVisitor'] : 0;
    }
}
