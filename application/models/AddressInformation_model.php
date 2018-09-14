<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/AddressInformationEntity.php';

class AddressInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createAddressInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('AddressCategoryID', 'AddressName', 'Address');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $check_require_field_erro;

        $data = array();
        $data['AddressCategoryID'] = $this->input->post('AddressCategoryID');
        $data['Name'] = $this->input->post('AddressName');
        $data['Address'] = $this->input->post('Address');
        $data['ContactNumber'] = $this->input->post('ContactNumber');
        $data['CreatedBy'] = $userID;
        $address_information_entity = new AddressInformationEntity($data);
        $address_information_data = $address_information_entity->getAddressInformationEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('addressinformation', $address_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function deleteAddress() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_id = $this->input->get('AddressID');
        $this->db->where('ID', $address_id);
        return $return = $this->db->delete('addressinformation');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllCountry() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('c.ID, c.Name');
        $this->db->from('country AS c');
        $this->db->order_by('c.Name');
        $all_existing_location = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_existing_location;
    }

    public function getAllState() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('s.ID, s.Name');
        $this->db->from('state AS s');
        $this->db->order_by('s.Name');
        $all_existing_location = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_existing_location;
    }

    public function getAllCity() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('ci.ID, ci.Name');
        $this->db->from('city AS ci');
        $this->db->order_by('ci.Name');
        $all_existing_location = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_existing_location;
    }

    public function getAllActiveAddressInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_category_id = $this->input->get('AddressCategoryID');
        $this->db->select('a.ID, a.Name, a.AddressCategoryID, a.Address, a.ContactNumber, a.IsActive');
        $this->db->from('addressinformation AS a');
        if (!empty($address_category_id)) {
            $this->db->where('a.AddressCategoryID', $address_category_id);
        }
        $this->db->where('a.IsActive', 1);
        $this->db->order_by('a.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getAddressDetail(){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $address_id = $this->input->get('AddressID');
        if ($address_id) {
            $this->db->select('a.ID, a.Name, a.AddressCategoryID, a.Address, a.ContactNumber, a.IsActive');
            $this->db->from('addressinformation AS a');
            $this->db->where('a.ID', $address_id);
            $this->db->where('a.IsActive', 1);
            $this->db->limit(1);
            $address_information = $this->db->get()->result_array();
            return isset($address_information[0]['ID']) ? $address_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateAddressInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_id = $this->input->get('AddressID');
        if (empty($address_id)) {
            return false;
        }

        $data = array();
        $data['AddressCategoryID'] = $this->input->post('AddressCategoryID');
        $data['Name'] = $this->input->post('AddressName');
        $data['Address'] = $this->input->post('Address');
        $data['ContactNumber'] = $this->input->post('ContactNumber');
        $data['CreatedBy'] = $userID;

        $require_fields = array('AddressCategoryID', 'AddressName', 'Address');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $address_information_entity = new AddressInformationEntity($data);
        $address_information_data = $address_information_entity->getAddressInformationEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($address_information_data);
        $this->db->where('ID', $address_id);
        if($this->db->update('addressinformation', $address_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllAddressInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('a.ID, a.Name, a.AddressCategoryID, a.Address, a.ContactNumber, a.IsActive, ac.Name AS AddressCategoryName');
        $this->db->from('addressinformation AS a');
        $this->db->join('addresscategory AS ac', 'a.AddressCategoryID = ac.ID', 'inner');
        $this->db->order_by('a.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getAllAddressCategories() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ac.ID, ac.Name');
        $this->db->from('addresscategory AS ac');
        $this->db->order_by('ac.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getAddressInformationForSidebar() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Name');
        $this->db->from('addressinformation');
        $this->db->where('IsActive', 1);
        $this->db->order_by('Name');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $result;
    }
}
