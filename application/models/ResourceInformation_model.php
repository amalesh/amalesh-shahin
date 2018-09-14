<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';

class ResourceInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllActiveResourceInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select("ID");
        $this->db->select("Title");
        $this->db->select("ResourceType");
        $this->db->select("ResourcePath");
        $this->db->from('resourceinformation');
        $this->db->where('IsActive', 1);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getResourceDetail() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $resource_id = $this->input->get('ResourceID');
        $this->db->select("ID");
        $this->db->select("Title");
        $this->db->select("ResourceType");
        $this->db->select("ResourcePath");
        $this->db->from('resourceinformation');
        $this->db->where('ID', $resource_id);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
}
