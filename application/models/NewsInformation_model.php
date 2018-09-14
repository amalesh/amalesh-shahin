<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/NewsInformationEntity.php';

class NewsInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveNewsInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
        $this->db->where('n.IsActive', 1);
        $result = $this->db->get()->result_array();
        $news_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $news_information[$total++] = $info;
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $news_information;
    }

    public function createNewsInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('Title', 'Description');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['PublishDateTime'] = $this->input->post('PublishDate');
        $data['UnpublishedDateTime'] = $this->input->post('UnpublishedDate');
        $data['ImagePath'] = $this->input->post('NewsImagePath');
        $data['CreatedBy'] = $userID;
        $news_information_entity = new NewsInformationEntity($data);
        $news_information_data = $news_information_entity->getNewsEntityForCreate();

        if (empty($news_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' News Data: '.print_r($data, true));
        if($this->db->insert('newsInformation', $news_information_data)) {
            $news_id = $this->db->insert_id();
            if (isset($_FILES["NewsImagePath"]) && $_FILES["NewsImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('NewsImages', 'NewsImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $news_id);
                    if($this->db->update('newsInformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteNews($news_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteNews($news_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllNewsInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
        $result = $this->db->get()->result_array();
        $news_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $news_information[$total++] = $info;
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $news_information;
    }

    public function getNewsDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $news_id = $this->input->get('NewsID');
        if ($news_id) {
            $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
            $this->db->from('newsInformation AS n');
            $this->db->where('n.ID', $news_id);
            $this->db->limit(1);
            $news_information = $this->db->get()->result_array();
            if (isset($news_information[0]['ID'])) {
                $news_information[0]['UnpublishedDateTime'] = substr($news_information[0]['UnpublishedDateTime'], 0, 10);
                $news_information[0]['UnpublishedDateTime'] = str_replace('-','/', $news_information[0]['UnpublishedDateTime']);
                $news_information[0]['PublishDateTime'] = substr($news_information[0]['PublishDateTime'], 0, 10);
                $news_information[0]['PublishDateTime'] = str_replace('-','/', $news_information[0]['PublishDateTime']);
                return $news_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateNewsInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $news_id = $this->input->get('NewsID');
        if (empty($news_id)) {
            return false;
        }

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['PublishDateTime'] = $this->input->post('PublishDate');
        $data['UnpublishedDateTime'] = $this->input->post('UnpublishedDate');
        $data['ImagePath'] = $this->input->post('NewsImagePath');
        $data['CreatedBy'] = $userID;

        $require_fields = array('Title', 'Description', 'Organization', 'Position', 'UnpublishedDateTime', 'PublishDateTime');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $news_information_entity = new NewsInformationEntity($data);

        $news_information_data = $news_information_entity->getNewsEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($news_information_data);
        $this->db->where('ID', $news_id);
        if($this->db->update('newsInformation')) {
            if (isset($_FILES["NewsImagePath"]) && $_FILES["NewsImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('NewsImages', 'NewsImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $news_id);
                    if($this->db->update('newsInformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteNews($news_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteNews($news_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteNews() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_id = $this->input->get('NewsID');
        $this->db->where('ID', $address_id);
        return $return = $this->db->delete('newsInformation');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getNewsInformationForSidebar() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->from('newsInformation');
        $this->db->where('PublishDateTime <=', date("Y-m-d H:i:s"));
        $this->db->where('UnpublishedDateTime >=', date("Y-m-d H:i:s"));
        $this->db->order_by('Title');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $result;
    }
}
