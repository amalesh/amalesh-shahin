<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/BrandInformationEntity.php';

class BrandInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createBrandInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('BrandName', 'GenericID', 'ManufacturerID', 'DosageFormID', 'StrengthID', 'PackSizeID', 'PriceInBDT');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Name'] = $this->input->post('BrandName');
        $data['GenericID'] = $this->input->post('GenericID');
        $data['ManufacturerID'] = $this->input->post('ManufacturerID');
        $data['DosageFormID'] = $this->input->post('DosageFormID');
        $data['StrengthID'] = $this->input->post('StrengthID');
        $data['PackSizeID'] = $this->input->post('PackSizeID');
        $data['PriceInBDT'] = $this->input->post('PriceInBDT');
        $data['IsHighlighted'] = $this->input->post('IsHighlighted');
        $data['IsNewProduct'] = $this->input->post('IsNewProduct');
        $data['IsNewBrand'] = $this->input->post('IsNewBrand');
        $data['IsNewPresentation'] = $this->input->post('IsNewPresentation');
        $data['CreatedBy'] = $userID;
        $brand_information_entity = new BrandInformationEntity($data);
        $brand_information_data = $brand_information_entity->getBrandEntityForCreate();
        $brand_information_data['CreateDate'] = date('Y-m-d H:i:s');

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('brandinformation', $brand_information_data)) {
//            echo $this->db->last_query();
            $brand_id = $this->db->insert_id();
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('BrandImages', 'ImagePath', 0, 0, 0);
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $brand_id);
                    if($this->db->update('brandinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteBrand($brand_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteBrand($brand_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
//            echo $this->db->last_query();
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveBrandInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('b.ID, b.Name, m.ID AS ManufacturerID, m.Name AS ManufacturerName, b.PriceInBDT, g.Name AS GenericName');
        $this->db->from('brandinformation AS b');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->where('b.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $this->db->order_by('b.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function searchBrandAlphabetically() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $alphabet = $this->input->get('Alphabet');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('b.ID, b.Name, m.ID AS ManufacturerID, m.Name AS ManufacturerName, b.PriceInBDT, g.Name AS GenericName');
        $this->db->from('brandinformation AS b');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->where('b.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->like('LOWER(b.Name)', $alphabet, 'after');
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $this->db->order_by('b.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function searchGenericAlphabetically() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $alphabet = $this->input->get('Alphabet');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('b.ID, b.Name, m.ID AS ManufacturerID, m.Name AS ManufacturerName, b.PriceInBDT, g.Name AS GenericName');
        $this->db->from('brandinformation AS d');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->where('b.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->like('LOWER(g.Name)', $alphabet, 'after');
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getTotal() {
        $this->db->from('brandinformation');
        $this->db->where('IsActive', 1);
        return $this->db->count_all_results();
    }

    public function getBrandDetail(){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $brand_id = $this->input->get('BrandID');
        if ($brand_id) {
            $this->db->select('b.ID');
            $this->db->select('b.Name');
            $this->db->select('b.PriceInBDT');
            $this->db->select('b.ImagePath');
            $this->db->select('g.ID AS GenericID');
//            $this->db->select('g.Name AS GenericName');
            $this->db->select('m.ID AS ManufacturerID');
//            $this->db->select('m.Name AS ManufacturerName');
            $this->db->select('df.ID AS DosageFormID');
//            $this->db->select('df.Name AS DosageForm');
            $this->db->select('s.ID AS StrengthID');
//            $this->db->select('s.Name AS StrengthName');
            $this->db->select('ps.ID AS PackSizeID');
//            $this->db->select('ps.Name AS PackSize');
            $this->db->select('b.IsHighlighted');
            $this->db->select('b.IsNewProduct');
            $this->db->select('b.IsNewBrand');
            $this->db->select('b.IsNewPresentation');
            $this->db->select('b.IsActive');
            $this->db->from('brandinformation AS b');
            $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
            $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
            $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
            $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
            $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
            $this->db->where('b.ID', $brand_id);
//            $this->db->where('g.IsActive', 1);
//            $this->db->where('m.IsActive', 1);
//            $this->db->where('df.IsActive', 1);
//            $this->db->where('s.IsActive', 1);
//            $this->db->where('ps.IsActive', 1);
            $this->db->limit(1);
            $information = $this->db->get()->result_array();
//            echo $this->db->last_query();
            return isset($information[0]) ? $information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method Enb.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function getBrandFullDetail(){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $brand_id = $this->input->get('BrandID');
        if ($brand_id) {
            $this->db->select('b.ID');
            $this->db->select('b.Name');
            $this->db->select('b.PriceInBDT');
            $this->db->select('b.ImagePath');
            $this->db->select('g.ID AS GenericID');
            $this->db->select('g.Name AS GenericName');
            $this->db->select('g.Classification');
            $this->db->select('g.SafetyRemark');
            $this->db->select('g.Indication');
            $this->db->select('g.DosageAdministration');
            $this->db->select('g.ContraindicationPrecaution');
            $this->db->select('g.SideEffect');
            $this->db->select('g.PregnancyLactation');
            $this->db->select('m.ID AS ManufacturerID');
            $this->db->select('m.Name AS ManufacturerName');
            $this->db->select('df.ID AS DosageFormID');
            $this->db->select('df.Name AS DosageForm');
            $this->db->select('s.ID AS StrengthID');
            $this->db->select('s.Name AS StrengthName');
            $this->db->select('ps.ID AS PackSizeID');
            $this->db->select('ps.Name AS PackSize');
            $this->db->select('b.IsHighlighted');
            $this->db->select('b.IsNewProduct');
            $this->db->select('b.IsNewBrand');
            $this->db->select('b.IsNewPresentation');
            $this->db->select('b.IsActive');
            $this->db->from('brandinformation AS b');
            $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
            $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
            $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
            $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
            $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
            $this->db->where('b.ID', $brand_id);
            $this->db->where('g.IsActive', 1);
            $this->db->where('m.IsActive', 1);
            $this->db->where('df.IsActive', 1);
            $this->db->where('s.IsActive', 1);
            $this->db->where('ps.IsActive', 1);
            $this->db->limit(1);
            $information = $this->db->get()->result_array();
//            echo $this->db->last_query();
            return isset($information[0]) ? $information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method Enb.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }


    public function updateBrandInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $brand_id = $this->input->get('BrandID');
        if (empty($brand_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('BrandName');
        $data['GenericID'] = $this->input->post('GenericID');
        $data['ManufacturerID'] = $this->input->post('ManufacturerID');
        $data['DosageFormID'] = $this->input->post('DosageFormID');
        $data['StrengthID'] = $this->input->post('StrengthID');
        $data['PackSizeID'] = $this->input->post('PackSizeID');
        $data['PriceInBDT'] = $this->input->post('PriceInBDT');
        $data['IsHighlighted'] = $this->input->post('IsHighlighted');
        $data['IsNewProduct'] = $this->input->post('IsNewProduct');
        $data['IsNewBrand'] = $this->input->post('IsNewBrand');
        $data['IsNewPresentation'] = $this->input->post('IsNewPresentation');
        $data['CreatedBy'] = $userID;

        $require_fields = array('BrandName', 'GenericID', 'ManufacturerID', 'DosageFormID', 'StrengthID', 'PackSizeID', 'PriceInBDT');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $brand_information_entity = new BrandInformationEntity($data);

        $brand_information_data = $brand_information_entity->getBrandEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($brand_information_data);
        $this->db->where('ID', $brand_id);
        if($this->db->update('brandinformation')) {
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('BrandImages', 'ImagePath', 0, 0, 0);
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $brand_id);
                    if($this->db->update('brandinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteBrand($brand_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteBrand($brand_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteBrand() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_id = $this->input->get('BrandID');
        $this->db->where('ID', $address_id);
        return $return = $this->db->delete('brandinformation');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getNewBrands() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_item = $this->input->get('AllBrand');
        $this->db->select('ID, Name');
        $this->db->from('brandinformation');
        $this->db->where('IsNewBrand', 1);
        $this->db->where('IsActive', 1);
        $this->db->order_by('Name');
        if ($all_item == 0) {
            $this->db->limit(config_item('home_page_new_item_limit'));
        }
        $all_new_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getNewPresentations() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_item = $this->input->get('AllPresentation');
        $this->db->select('ID, Name');
        $this->db->from('brandinformation');
        $this->db->where('IsNewPresentation', 1);
        $this->db->where('IsActive', 1);
        $this->db->order_by('Name');
        if ($all_item == 0) {
            $this->db->limit(config_item('home_page_new_item_limit'));
        }
        $all_new_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getNewProducts() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_item = $this->input->get('AllProduct');
        $this->db->select('ID, Name');
        $this->db->from('brandinformation');
        $this->db->where('IsNewProduct', 1);
        $this->db->where('IsActive', 1);
        $this->db->order_by('Name');
        if ($all_item == 0) {
            $this->db->limit(config_item('home_page_new_item_limit'));
        }
        $all_new_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getHighlightedBrands() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('b.ID');
        $this->db->select('b.Name');
        $this->db->select('b.PriceInBDT');
        $this->db->select('b.ImagePath');
        $this->db->select('g.ID AS GenericID');
        $this->db->select('g.Name AS GenericName');
        $this->db->select('g.Classification');
        $this->db->select('g.SafetyRemark');
        $this->db->select('g.Indication');
        $this->db->select('g.DosageAdministration');
        $this->db->select('g.ContraindicationPrecaution');
        $this->db->select('g.SideEffect');
        $this->db->select('g.PregnancyLactation');
        $this->db->select('m.ID AS ManufacturerID');
        $this->db->select('m.Name AS ManufacturerName');
        $this->db->select('df.ID AS DosageFormID');
        $this->db->select('df.Name AS DosageForm');
        $this->db->select('s.ID AS StrengthID');
        $this->db->select('s.Name AS StrengthName');
        $this->db->select('ps.ID AS PackSizeID');
        $this->db->select('ps.Name AS PackSize');
        $this->db->select('b.IsHighlighted');
        $this->db->select('b.IsNewProduct');
        $this->db->select('b.IsNewBrand');
        $this->db->select('b.IsNewPresentation');
        $this->db->select('b.IsActive');
        $this->db->from('brandinformation AS b');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
        $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
        $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->where('df.IsActive', 1);
        $this->db->where('s.IsActive', 1);
        $this->db->where('ps.IsActive', 1);
        $this->db->where('b.IsHighlighted', 1);
        $this->db->order_by('b.CreateDate', 'DESC');
        $this->db->limit(1);
        $all_new_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return isset($all_new_information[0]['ID']) ? $all_new_information[0] : array();
    }

    public function getAllDrugInfoForAutoComplete() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('Name');
        $this->db->distinct();
        $this->db->from('brandinformation');
        $this->db->where('IsActive', 1);
        $result = $this->db->get()->result_array();
        $brand_information = array();
        foreach ($result AS $data) {
            $brand_information[] = $data['Name'];
        }

        $this->db->select('Name');
        $this->db->distinct();
        $this->db->from('genericinformation');
        $this->db->where('IsActive', 1);
        $result = $this->db->get()->result_array();
        $generic_information = array();
        foreach ($result AS $data) {
            $generic_information[] = $data['Name'];
        }

        $this->db->select('Indication');
        $this->db->distinct();
        $this->db->from('genericinformation');
        $this->db->where('IsActive', 1);
        $result = $this->db->get()->result_array();
        $indication_information = array();
        foreach ($result AS $data) {
            $indication_information[] = $data['Indication'];
        }

        $this->db->select('Name');
        $this->db->distinct();
        $this->db->from('manufacturerinformation');
        $this->db->where('IsActive', 1);
        $result = $this->db->get()->result_array();
        $manufacturer_information = array();
        foreach ($result AS $data) {
            $manufacturer_information[] = $data['Name'];
        }

        $search_option_data = array(
            'Brand' => $brand_information,
            'Generic' => $generic_information,
            'Indication' => $indication_information,
            'Manufacturer' => $manufacturer_information
        );

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $search_option_data;
    }

    public function getAllNewData($brandType) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('b.ID');
        $this->db->select('b.Name');
        $this->db->select('b.PriceInBDT');
        $this->db->select('g.ID AS GenericID');
        $this->db->select('g.Name AS GenericName');
        $this->db->select('m.ID AS ManufacturerID');
        $this->db->select('m.Name AS ManufacturerName');
        $this->db->from('brandinformation AS b');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->where('b.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        switch ($brandType) {
            case 'Product':
                $this->db->where('b.IsNewProduct', 1);
                break;
            case 'Brand':
                $this->db->where('b.IsNewBrand', 1);
                break;
            case 'Presentation':
                $this->db->where('b.IsNewPresentation', 1);
                break;
            default:
                break;
        }

        $this->db->order_by('b.Name');
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $all_new_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getTotalNewData($brandType) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->from('brandinformation AS b');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->where('b.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        switch ($brandType) {
            case 'Product':
                $this->db->where('b.IsNewProduct', 1);
                break;
            case 'Brand':
                $this->db->where('b.IsNewBrand', 1);
                break;
            case 'Presentation':
                $this->db->where('b.IsNewPresentation', 1);
                break;
            default:
                break;
        }

        $total = $this->db->count_all_results();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $total;
    }

    public function getSearchResult($option_type, $option_value) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_new_information = array();
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;

        switch ($option_type) {
            case 'brand':
                $this->db->select('b.ID');
                $this->db->select('b.Name');
                $this->db->select('b.PriceInBDT');
                $this->db->select('df.Name AS DosageForm');
                $this->db->select('s.Name AS StrengthName');
                $this->db->select('ps.Name AS PackSize');
                $this->db->select('g.ID AS GenericID');
                $this->db->select('g.Name AS GenericName');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
                $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
                $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('df.IsActive', 1);
                $this->db->where('s.IsActive', 1);
                $this->db->where('ps.IsActive', 1);
                $this->db->where('LOWER(b.Name)', strtolower($option_value));
                $this->db->order_by('b.Name');
                $this->db->limit(config_item('per_page_information_number_for_brand_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_search'));
                $all_new_information = $this->db->get()->result_array();
                break;
            case 'brand_by_alphabetically':
                $this->db->select('b.ID');
                $this->db->select('b.Name');
                $this->db->select('b.PriceInBDT');
                $this->db->select('df.Name AS DosageForm');
                $this->db->select('s.Name AS StrengthName');
                $this->db->select('ps.Name AS PackSize');
                $this->db->select('g.ID AS GenericID');
                $this->db->select('g.Name AS GenericName');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
                $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
                $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('df.IsActive', 1);
                $this->db->where('s.IsActive', 1);
                $this->db->where('ps.IsActive', 1);
                $this->db->like('LOWER(b.Name)', $option_value, 'after');
                $this->db->order_by('b.Name');
                $this->db->limit(config_item('per_page_information_number_for_brand_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_by_alphabetically_search'));
                $all_new_information = $this->db->get()->result_array();
                break;
            case 'generic':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->where('LOWER(g.Name)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "m.Name"));
                $this->db->order_by('b.Name', 'm.Name');
                $this->db->limit(config_item('per_page_information_number_for_generic_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_search'));
                $all_data = $this->db->get()->result_array();

                $this->db->select('g.Name');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('genericinformation AS g');
                $this->db->where('g.IsActive', 1);
                $this->db->where('LOWER(g.Name)', strtolower($option_value));
                $this->db->limit(1);
                $generic_data = $this->db->get()->result_array();

                return array($all_data, $generic_data);
                break;
            case 'generic_by_alphabetically':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->like('LOWER(g.Name)', $option_value, 'after');
                $this->db->group_by(array("b.Name", "g.Name", "m.Name"));
                $this->db->order_by("b.Name", "g.Name", "m.Name");
                $this->db->limit(config_item('per_page_information_number_for_generic_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_by_alphabetically_search'));
                $all_new_information = $this->db->get()->result_array();
                break;
            case 'indication':
                $this->db->select('g.Name');
                $this->db->from('genericinformation AS g');
                $this->db->where('g.IsActive', 1);
                $this->db->like('LOWER(g.Indication)', strtolower($option_value));
                $this->db->order_by('g.Name');
                $this->db->limit(config_item('per_page_information_number_for_indication_search'), ($page_no - 1) * config_item('per_page_information_number_for_indication_search'));
                $all_new_information = $this->db->get()->result_array();
                break;
            case 'manufacturer':
                $this->db->select('b.Name');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->where('LOWER(m.Name)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "g.Name"));
                $this->db->order_by('b.Name', 'g.Name');
                $this->db->limit(config_item('per_page_information_number_for_manufacturer_search'), ($page_no - 1) * config_item('per_page_information_number_for_manufacturer_search'));
                $all_new_information = $this->db->get()->result_array();
                break;
            default:
                break;
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getTotalSearchResult($option_type, $option_value) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $total = 0;
        switch ($option_type) {
            case 'brand':
                $this->db->select('b.ID');
                $this->db->select('b.Name');
                $this->db->select('b.PriceInBDT');
                $this->db->select('df.Name AS DosageForm');
                $this->db->select('s.Name AS StrengthName');
                $this->db->select('ps.Name AS PackSize');
                $this->db->select('g.ID AS GenericID');
                $this->db->select('g.Name AS GenericName');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
                $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
                $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('df.IsActive', 1);
                $this->db->where('s.IsActive', 1);
                $this->db->where('ps.IsActive', 1);
                $this->db->where('LOWER(b.Name)', strtolower($option_value));
                $data = $this->db->get()->result_array();
                $total = count($data);
                break;
            case 'brand_by_alphabetically':
                $this->db->select('b.ID');
                $this->db->select('b.Name');
                $this->db->select('b.PriceInBDT');
                $this->db->select('df.Name AS DosageForm');
                $this->db->select('s.Name AS StrengthName');
                $this->db->select('ps.Name AS PackSize');
                $this->db->select('g.ID AS GenericID');
                $this->db->select('g.Name AS GenericName');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
                $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
                $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('df.IsActive', 1);
                $this->db->where('s.IsActive', 1);
                $this->db->where('ps.IsActive', 1);
                $this->db->like('LOWER(b.Name)', $option_value, 'after');
                $data = $this->db->get()->result_array();
                $total = count($data);
                break;
            case 'generic':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->where('LOWER(g.Name)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "m.Name"));
                $data = $this->db->get()->result_array();
                $total = count($data);
                break;
            case 'generic_by_alphabetically':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->like('LOWER(g.Name)', $option_value, 'after');
                $this->db->group_by(array("b.Name", "g.Name", "m.Name"));
                $data = $this->db->get()->result_array();
                $total = count($data);
                break;
            case 'indication':
                $this->db->select('g.Name');
                $this->db->from('genericinformation AS g');
                $this->db->where('g.IsActive', 1);
                $this->db->like('LOWER(g.Indication)', strtolower($option_value));
                $data = $this->db->get()->result_array();
                $total = count($data);
                break;
            case 'manufacturer':
                $this->db->select('b.Name');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->where('LOWER(m.Name)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "g.Name"));
                $data = $this->db->get()->result_array();
                $total = count($data);
                break;
            default:
                break;
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $total;
    }

    public function getSearchResultForFrontend($option_type, $option_value) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $data = array();
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;

        switch ($option_type) {
            case 'brand':
                $this->db->select('b.ID');
                $this->db->select('b.Name');
                $this->db->select('b.PriceInBDT');
                $this->db->select('df.Name AS DosageForm');
                $this->db->select('s.Name AS StrengthName');
                $this->db->select('ps.Name AS PackSize');
                $this->db->select('g.ID AS GenericID');
                $this->db->select('g.Name AS GenericName');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
                $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
                $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('df.IsActive', 1);
                $this->db->where('s.IsActive', 1);
                $this->db->where('ps.IsActive', 1);
                $this->db->where('LOWER(b.Name)', strtolower($option_value));
                $this->db->order_by('b.Name');
                $this->db->limit(config_item('per_page_information_number_for_brand_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_search'));
                $data = $this->db->get()->result_array();
                break;
            case 'brand_by_alphabetically':
                $this->db->select('b.ID');
                $this->db->select('b.Name');
                $this->db->select('b.PriceInBDT');
                $this->db->select('df.Name AS DosageForm');
                $this->db->select('s.Name AS StrengthName');
                $this->db->select('ps.Name AS PackSize');
                $this->db->select('g.ID AS GenericID');
                $this->db->select('g.Name AS GenericName');
                $this->db->select('g.Classification');
                $this->db->select('g.SafetyRemark');
                $this->db->select('g.Indication');
                $this->db->select('g.DosageAdministration');
                $this->db->select('g.ContraindicationPrecaution');
                $this->db->select('g.SideEffect');
                $this->db->select('g.PregnancyLactation');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
                $this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
                $this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('df.IsActive', 1);
                $this->db->where('s.IsActive', 1);
                $this->db->where('ps.IsActive', 1);
                $this->db->like('LOWER(b.Name)', $option_value, 'after');
                $this->db->order_by('b.Name');
                $this->db->limit(config_item('per_page_information_number_for_brand_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_by_alphabetically_search'));
                $data = $this->db->get()->result_array();
                break;
            case 'generic':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->where('LOWER(g.Name)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "m.Name"));
                $this->db->order_by('b.Name', 'm.Name');
                $this->db->limit(config_item('per_page_information_number_for_generic_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_search'));
                $data = $this->db->get()->result_array();
                break;
            case 'generic_by_alphabetically':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->like('LOWER(g.Name)', $option_value, 'after');
                $this->db->group_by(array("b.Name", "g.Name", "m.Name"));
                $this->db->order_by("b.Name", "g.Name", "m.Name");
                $this->db->limit(config_item('per_page_information_number_for_generic_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_by_alphabetically_search'));
                $data = $this->db->get()->result_array();
                break;
            case 'indication':
                $this->db->select('b.Name');
                $this->db->select('m.Name AS ManufacturerName');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                $this->db->like('LOWER(g.Indication)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "g.Name", "m.Name"));
                $this->db->order_by('b.Name', 'g.Name', 'm.Name');
                $this->db->limit(config_item('per_page_information_number_for_indication_search'), ($page_no - 1) * config_item('per_page_information_number_for_indication_search'));
                $data = $this->db->get()->result_array();
                break;
            case 'manufacturer':
                $manufacturer_brand_option = $this->input->get('ManufacturerBrandOption');
                $this->db->select('b.Name');
                $this->db->select('g.Name AS GenericName');
                $this->db->from('brandinformation AS b');
                $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
                $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
                $this->db->where('b.IsActive', 1);
                $this->db->where('g.IsActive', 1);
                $this->db->where('m.IsActive', 1);
                if (!empty($manufacturer_brand_option)) {
                    $this->db->like('LOWER(b.Name)', $manufacturer_brand_option, 'after');
                }
                $this->db->where('LOWER(m.Name)', strtolower($option_value));
                $this->db->group_by(array("b.Name", "g.Name"));
                $this->db->order_by('b.Name', 'g.Name');
                $this->db->limit(config_item('per_page_information_number_for_manufacturer_search'), ($page_no - 1) * config_item('per_page_information_number_for_manufacturer_search'));
                $data = $this->db->get()->result_array();
                break;
            default:
                break;
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $data;
    }

    public function getTotalManufacturerBrand() {
        $manufacturer = $this->input->get('Manufacturer');
        $manufacturer_brand_option = $this->input->get('ManufacturerBrandOption');
        $this->db->select('b.Name');
        $this->db->from('brandinformation AS b');
        $this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
        $this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
        $this->db->where('b.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        if (!empty($manufacturer_brand_option)) {
            $this->db->like('LOWER(b.Name)', $manufacturer_brand_option, 'after');
        }
        $this->db->where('LOWER(m.Name)', strtolower($manufacturer));
        $this->db->group_by(array("b.Name", "g.Name"));
        $data = $this->db->get()->result_array();
        return count($data);
    }
}
