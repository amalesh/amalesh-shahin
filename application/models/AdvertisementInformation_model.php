<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/AdvertisementInformationEntity.php';

class AdvertisementInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createAdvertisementInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('Organization', 'PublishDate', 'UnpublishedDate', 'AdvertisementPositionID');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Organization'] = $this->input->post('Organization');
        $data['Title'] = $this->input->post('Title');
        $data['BodyText'] = $this->input->post('BodyText');
        $data['LinkURL'] = $this->input->post('LinkURL');
        $data['PublishDate'] = $this->util->convertToDate($this->input->post('PublishDate'));
        $data['UnpublishedDate'] = $this->util->convertToDate($this->input->post('UnpublishedDate'));
        $data['AdvertisementPositionID'] = $this->input->post('AdvertisementPositionID');
        $data['ContactPerson'] = $this->input->post('ContactPerson');
        $data['EmailID'] = $this->input->post('EmailID');
        $data['MobileNo'] = $this->input->post('MobileNo');
        $data['CreatedBy'] = $userID;
        $advertisement_information_entity = new AdvertisementInformationEntity($data);
        $advertisement_information_data = $advertisement_information_entity->getAdvertisementInformationEntityForCreate();

        if (empty($advertisement_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Advertisement Data: '.print_r($data, true));
        if($this->db->insert('advertisementinformation', $advertisement_information_data)) {
            $advertisement_id = $this->db->insert_id();
            $this->load->model('AdvertisementPositionInformation_model');
            $advertisement_position_detail = $this->AdvertisementPositionInformation_model->getAdvertisementPositionDetail($data['AdvertisementPositionID']);
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name'] && $advertisement_position_detail['ID']){
                $max_width = $advertisement_position_detail['ImageWidth'];
                $max_height = $advertisement_position_detail['ImageHeight'];
                $upload_data = $this->util->upload('AdvertisementImages', 'ImagePath', $max_width, $max_height, 0);
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $advertisement_id);
                    if($this->db->update('advertisementinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteAdvertisement($advertisement_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteAdvertisement($advertisement_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            } else {
                $this->deleteAdvertisement($advertisement_id);
                return $this->prepareErrorResponse(ERROR_UNKNOWN);
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllAdvertisementInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('a.ID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo, p.Name AS PositionName');
        $this->db->from('advertisementinformation AS a');
        $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
        $result = $this->db->get()->result_array();
        $advertisement_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $info['UnpublishedDate'] = substr($info['UnpublishedDate'], 0, 10);
            $advertisement_information[$total++] = $info;
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $advertisement_information;
    }

    public function getAdvertisementDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $advertisement_id = $this->input->get('AdvertisementID');
        if ($advertisement_id) {
            $this->db->select('a.ID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo');
            $this->db->from('advertisementinformation AS a');
            $this->db->where('a.ID', $advertisement_id);
            $this->db->limit(1);
            $advertisement_information = $this->db->get()->result_array();
            if (isset($advertisement_information[0]['ID'])) {
                $advertisement_information[0]['PublishDate'] = substr($advertisement_information[0]['PublishDate'], 0, 10);
                $advertisement_information[0]['PublishDate'] = str_replace('-','/', $advertisement_information[0]['PublishDate']);
                $advertisement_information[0]['UnpublishedDate'] = substr($advertisement_information[0]['UnpublishedDate'], 0, 10);
                $advertisement_information[0]['UnpublishedDate'] = str_replace('-','/', $advertisement_information[0]['UnpublishedDate']);
                return $advertisement_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $advertisement_id = $this->input->get('AdvertisementID');
        if (empty($advertisement_id)) {
            return false;
        }

        $data = array();
        $data['Organization'] = $this->input->post('Organization');
        $data['Title'] = $this->input->post('Title');
        $data['BodyText'] = $this->input->post('BodyText');
        $data['LinkURL'] = $this->input->post('LinkURL');
        $data['PublishDate'] = $this->input->post('PublishDate');
        $data['UnpublishedDate'] = $this->input->post('UnpublishedDate');
        $data['AdvertisementPositionID'] = $this->input->post('AdvertisementPositionID');
        $data['ContactPerson'] = $this->input->post('ContactPerson');
        $data['EmailID'] = $this->input->post('EmailID');
        $data['MobileNo'] = $this->input->post('MobileNo');

        $require_fields = array('Organization', 'PublishDate', 'UnpublishedDate', 'AdvertisementPositionID');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $advertisement_information_entity = new AdvertisementInformationEntity($data);

        $advertisement_information_data = $advertisement_information_entity->getAdvertisementInformationEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($advertisement_information_data);
        $this->db->where('ID', $advertisement_id);
        if($this->db->update('advertisementinformation')) {
            $this->load->model('AdvertisementPositionInformation_model');
            $advertisement_position_detail = $this->AdvertisementPositionInformation_model->getAdvertisementPositionDetail($data['AdvertisementPositionID']);
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name'] && $advertisement_position_detail['ID']){
                $max_width = $advertisement_position_detail['ImageWidth'];
                $max_height = $advertisement_position_detail['ImageHeight'];
                $upload_data = $this->util->upload('AdvertisementImages', 'ImagePath', $max_width, $max_height, 0);
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $advertisement_id);
                    if($this->db->update('advertisementinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteAdvertisement($advertisement_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteAdvertisement($advertisement_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteAdvertisement() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_id = $this->input->get('AdvertisementID');
        $this->db->where('ID', $address_id);
        return $return = $this->db->delete('advertisementinformation');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getPositionWiseAdvertisementInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page = $this->input->get('Page');
        $advertisement_detail = config_item('advertisement_detail');
        $advertisement_info = $advertisement_detail[$page];
        $advertisements = array();
        $count = 0;
        foreach ($advertisement_info AS $advertisement) {
            $this->db->select('a.Title');
            $this->db->select('a.BodyText');
            $this->db->select('a.LinkURL');
            $this->db->select('a.ImagePath');
            $this->db->select('p.ClassName');
            $this->db->select('p.Interval');
            $this->db->from('advertisementinformation AS a');
            $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
            $this->db->where('a.PublishDate <=', date('Y-m-d'));
            $this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
            $this->db->where('a.IsActive', 1);
            $this->db->where('p.ClassName', $advertisement[0]);
            $this->db->where('p.IsActive', 1);
            $this->db->limit($advertisement[1]);

            $advertisements[$count++] = $this->db->get()->result_array();
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $advertisements;
    }
}
