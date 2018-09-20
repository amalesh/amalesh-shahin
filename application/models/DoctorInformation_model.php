<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/DoctorInformationEntity.php';

class DoctorInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Location_model');
    }

    public function createDoctorInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('DoctorName', 'ProfessionDegree', 'Gender');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Name'] = $this->input->post('DoctorName');
        $data['Specialization'] = $this->input->post('Specialization');
        $data['ProfessionDegree'] = $this->input->post('ProfessionDegree');
        $data['Gender'] = $this->input->post('Gender');
        $data['ImagePath'] = $this->input->post('ImagePath');
        $data['HomeAddressID'] = $this->input->post('HomeAddressID');
        if (empty($data['HomeAddressID'])) {
            $location_data = array();
            $location_data['CountryID'] = $this->input->post('HomeCountryID');
            $location_data['StateID'] = $this->input->post('HomeStateID');
            $location_data['CityID'] = $this->input->post('HomeCityID');
            $location_data['Address'] = $this->input->post('HomeAddress');
            $location_data['Longitude'] = $this->input->post('HomeLongitude');
            $location_data['Latitude'] = $this->input->post('HomeLatitude');
            $location_data['CreatedBy'] = $userID;
            $data['HomeAddressID'] = $this->Location_model->createLocation($userID, $location_data);
            if ($data['HomeAddressID'] == false) {
                return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
            }
        }
        $data['ChamberAddressID'] = $this->input->post('ChamberAddressID');
        if (empty($data['ChamberAddressID'])) {
            $location_data = array();
            $location_data['CountryID'] = $this->input->post('ChamberCountryID');
            $location_data['StateID'] = $this->input->post('ChamberStateID');
            $location_data['CityID'] = $this->input->post('ChamberCityID');
            $location_data['Address'] = $this->input->post('ChamberAddress');
            $location_data['Longitude'] = $this->input->post('ChamberLongitude');
            $location_data['Latitude'] = $this->input->post('ChamberLatitude');
            $location_data['CreatedBy'] = $userID;
            $data['ChamberAddressID'] = $this->Location_model->createLocation($userID, $location_data);
            if ($data['ChamberAddressID'] == false) {
                return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
            }
        }
        $data['PhoneNo'] = $this->input->post('PhoneNo');
        $data['MobileNo1'] = $this->input->post('MobileNo1');
        $data['MobileNo2'] = $this->input->post('MobileNo2');
        $data['MobileNo3'] = $this->input->post('MobileNo3');
        $data['Hotline'] = $this->input->post('Hotline');
        $data['CreatedBy'] = $userID;
        $doctor_information_entity = new DoctorInformationEntity($data);
        $doctor_information_data = $doctor_information_entity->getDoctorEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Doctor Data: '.print_r($data, true));
        if($this->db->insert('doctorinformation', $doctor_information_data)) {
            $doctor_id = $this->db->insert_id();
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('DoctorImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $doctor_id);
                    if($this->db->update('doctorinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteDoctor($doctor_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteDoctor($doctor_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllDoctorInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select("d.ID");
        $this->db->select("d.Name");
        $this->db->select("d.Specialization");
        $this->db->select("d.ProfessionDegree");
        $this->db->select("d.Gender");
        $this->db->select("d.ImagePath");
        $this->db->select("d.PhoneNo");
        $this->db->select("d.MobileNo1");
        $this->db->select("d.MobileNo2");
        $this->db->select("d.MobileNo3");
        $this->db->select("d.Hotline");
        $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
        $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
        $this->db->select("cc.Name AS cCountryName");
        $this->db->select("cs.Name AS sStateName");
        $this->db->select("cci.Name AS cCityName");
        $this->db->select("hc.Name AS hCountryName");
        $this->db->select("hs.Name AS hStateName");
        $this->db->select("hci.Name AS hCityName");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID', 'left');
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getAllActiveDoctorInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select("d.ID");
        $this->db->select("d.Name");
        $this->db->select("d.Specialization");
        $this->db->select("d.ProfessionDegree");
        $this->db->select("d.Gender");
        $this->db->select("d.ImagePath");
        $this->db->select("d.PhoneNo");
        $this->db->select("d.MobileNo1");
        $this->db->select("d.MobileNo2");
        $this->db->select("d.MobileNo3");
        $this->db->select("d.Hotline");
        $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
        $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
        $this->db->select("cc.Name AS cCountryName");
        $this->db->select("cs.Name AS sStateName");
        $this->db->select("cci.Name AS cCityName");
        $this->db->select("hc.Name AS hCountryName");
        $this->db->select("hs.Name AS hStateName");
        $this->db->select("hci.Name AS hCityName");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID', 'left');
        $this->db->where('d.IsActive', 1);
        $this->db->limit(config_item('per_page_doctor_information_number'), ($page_no - 1) * config_item('per_page_doctor_information_number'));
        $all_doctor_information = $this->db->get()->result_array();

        $this->db->select("d.ID");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID', 'left');
        $this->db->where('d.IsActive', 1);
        $all_information = $this->db->get()->result_array();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($all_doctor_information, count($all_information));
    }

    public function getDoctorDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $doctor_id = $this->input->get('DoctorID');
        if ($doctor_id) {
            $this->db->select("d.ID");
            $this->db->select("d.Name");
            $this->db->select("d.Specialization");
            $this->db->select("d.ProfessionDegree");
            $this->db->select("d.Gender");
            $this->db->select("d.ImagePath");
            $this->db->select("d.PhoneNo");
            $this->db->select("d.MobileNo1");
            $this->db->select("d.MobileNo2");
            $this->db->select("d.MobileNo3");
            $this->db->select("d.Hotline");
            $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
            $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
            $this->db->select("cc.Name AS cCountryName");
            $this->db->select("cs.Name AS sStateName");
            $this->db->select("cci.Name AS cCityName");
            $this->db->select("hc.Name AS hCountryName");
            $this->db->select("hs.Name AS hStateName");
            $this->db->select("hci.Name AS hCityName");
            $this->db->from('doctorinformation AS d');
            $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID', 'left');
            $this->db->join('country AS cc', 'cl.CountryID = cc.ID', 'left');
            $this->db->join('state AS cs', 'cl.StateID = cs.ID', 'left');
            $this->db->join('city AS cci', 'cl.CityID = cci.ID', 'left');
            $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID', 'left');
            $this->db->join('country AS hc', 'hl.CountryID = hc.ID', 'left');
            $this->db->join('state AS hs', 'hl.StateID = hs.ID', 'left');
            $this->db->join('city AS hci', 'hl.CityID = hci.ID', 'left');
            $this->db->limit(1);
            $doctor_information = $this->db->get()->result_array();
            return isset($doctor_information[0]['ID']) ? $doctor_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateDoctorInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $doctor_id = $this->input->get('DoctorID');
        if (empty($doctor_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('DoctorName');
        $data['Specialization'] = $this->input->post('Specialization');
        $data['ProfessionDegree'] = $this->input->post('ProfessionDegree');
        $data['Gender'] = $this->input->post('Gender');
        $data['ImagePath'] = $this->input->post('ImagePath');
        if (empty($data['HomeAddressID'])) {
            $location_data = array();
            $location_data['CountryID'] = $this->input->post('HomeCountryID');
            $location_data['StateID'] = $this->input->post('HomeStateID');
            $location_data['CityID'] = $this->input->post('HomeCityID');
            $location_data['Address'] = $this->input->post('HomeAddress');
            $location_data['Longitude'] = $this->input->post('HomeLongitude');
            $location_data['Latitude'] = $this->input->post('HomeLatitude');
            $location_data['CreatedBy'] = $userID;
            $data['HomeAddressID'] = $this->Location_model->createLocation($userID, $location_data);
            if ($data['HomeAddressID'] == false) {
                return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
            }
        }
        $data['ChamberAddressID'] = $this->input->post('ChamberAddressID');
        if (empty($data['ChamberAddressID'])) {
            $location_data = array();
            $location_data['CountryID'] = $this->input->post('ChamberCountryID');
            $location_data['StateID'] = $this->input->post('ChamberStateID');
            $location_data['CityID'] = $this->input->post('ChamberCityID');
            $location_data['Address'] = $this->input->post('ChamberAddress');
            $location_data['Longitude'] = $this->input->post('ChamberLongitude');
            $location_data['Latitude'] = $this->input->post('ChamberLatitude');
            $location_data['CreatedBy'] = $userID;
            $data['ChamberAddressID'] = $this->Location_model->createLocation($userID, $location_data);
            if ($data['ChamberAddressID'] == false) {
                return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
            }
        }
        $data['PhoneNo'] = $this->input->post('PhoneNo');
        $data['MobileNo1'] = $this->input->post('MobileNo1');
        $data['MobileNo2'] = $this->input->post('MobileNo2');
        $data['MobileNo3'] = $this->input->post('MobileNo3');
        $data['Hotline'] = $this->input->post('Hotline');
        $data['CreatedBy'] = $userID;

        $require_fields = array('DoctorName', 'ProfessionDegree', 'Gender');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $doctor_information_entity = new DoctorInformationEntity($data);
        $doctor_information_data = $doctor_information_entity->getDoctorEntityForUpdate();

        $this->db->set($doctor_information_data);
        $this->db->where('ID', $doctor_id);
        if($this->db->update('doctorinformation')) {
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('DoctorImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $doctor_id);
                    if($this->db->update('doctorinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteDoctor($doctor_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteDoctor($doctor_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteDoctor() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_id = $this->input->get('DoctorID');
        $this->db->where('ID', $address_id);
        return $return = $this->db->delete('doctorinformation');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function search($doctorSearchBy, $doctorLocation, $doctorGender, $doctorArea) {
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select("d.ID");
        $this->db->select("d.Name");
        $this->db->select("d.Specialization");
        $this->db->select("d.ProfessionDegree");
        $this->db->select("d.Gender");
        $this->db->select("d.ImagePath");
        $this->db->select("d.PhoneNo");
        $this->db->select("d.MobileNo1");
        $this->db->select("d.MobileNo2");
        $this->db->select("d.MobileNo3");
        $this->db->select("d.Hotline");
        $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
        $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
        $this->db->select("cc.Name AS cCountryName");
        $this->db->select("cs.Name AS sStateName");
        $this->db->select("cci.Name AS cCityName");
        $this->db->select("hc.Name AS hCountryName");
        $this->db->select("hs.Name AS hStateName");
        $this->db->select("hci.Name AS hCityName");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID', 'left');
        $this->db->where('d.IsActive', 1);
        if ($doctorGender) {
            $this->db->where('d.Gender', $doctorGender);
        }

        if ($doctorLocation) {
            $this->db->where('cl.CityID', $doctorLocation);
        }

        if ($doctorArea) {
            $this->db->like('LOWER(cl.Address)', strtolower($doctorArea));
        }

        if ($doctorSearchBy) {
            $where = sprintf("(LOWER(d.Specialization) LIKE '%s%s%s' OR LOWER(d.Name) LIKE '%s%s%s' OR LOWER(cl.Address) LIKE '%s%s%s')", '%', strtolower($doctorSearchBy), '%', '%', strtolower($doctorSearchBy), '%', '%', strtolower($doctorSearchBy), '%');
            $this->db->where($where);
        }

        $this->db->limit(config_item('per_page_doctor_information_number'), ($page_no - 1) * config_item('per_page_doctor_information_number'));

        $all_doctor_information = $this->db->get()->result_array();

        $this->db->select('d.ID');
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID', 'left');
        $this->db->where('d.IsActive', 1);
        if ($doctorGender) {
            $this->db->where('d.Gender', $doctorGender);
        }

        if ($doctorLocation) {
            $this->db->like('LOWER(cl.Address)', strtolower($doctorLocation));
        }

        if ($doctorSearchBy) {
            $where = sprintf("(LOWER(d.Specialization) LIKE '%s%s%s' OR LOWER(d.Name) LIKE '%s%s%s' OR LOWER(cl.Address) LIKE '%s%s%s')", '%', strtolower($doctorSearchBy), '%', '%', strtolower($doctorSearchBy), '%', '%', strtolower($doctorSearchBy), '%');
            $this->db->where($where);
        }

        $all_information = $this->db->get()->result_array();

        return array($all_doctor_information, count($all_information));
    }
}
