<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Brand extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BrandInformation_model');
    }

    public function showBrandList()
    {
        $total_brand = $this->BrandInformation_model->getTotal();
        $data['TotalBrand'] = $total_brand;

        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('front-end/brand-list', $data);
        $this->load->view('js/frontend-brand-script');
        $this->load->view('front-end/footer');
    }

    public function getAllBrandInformation()
    {
        $all_brand_information = $this->BrandInformation_model->getAllActiveBrandInformation();
        $this->sendRestAPIResponse($all_brand_information);
    }

    public function showBrandDetail()
    {
        $data = array();
        $data['BrandDetail'] = $this->BrandInformation_model->getBrandFullDetail();
        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('front-end/brand-detail', $data);
        $this->load->view('front-end/footer');
    }

    public function getBrandListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }
        $all_brand_information = $this->BrandInformation_model->getAllActiveBrandInformation();
        $data = array();
        $data['AllBrand'] = $all_brand_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/brand', $data);
        $this->load->view('js/admin-brand-script');
        $this->load->view('admin/footer');
    }

    public function getAllGeneralInformation() {
        $this->load->model('GenericInformation_model');
        $this->load->model('ManufacturerInformation_model');
        $this->load->model('DosageFormInformation_model');
        $this->load->model('StrengthInformation_model');
        $this->load->model('PackSizeInformation_model');

        $data = array();
        $data['GenericInfo'] = $this->GenericInformation_model->getAllGenericInformation();
        $data['ManufacturerInfo'] = $this->ManufacturerInformation_model->getAllManufacturerInformation();
        $data['DosageFormInfo'] = $this->DosageFormInformation_model->getAllDosageFormInformation();
        $data['StrengthInfo'] = $this->StrengthInformation_model->getAllStrengthInformation();
        $data['PackSizeInfo'] = $this->PackSizeInformation_model->getAllPackSizeInformation();
        $this->sendRestAPIResponse($data);
    }

    public function addBrand() {
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
        $return = $this->BrandInformation_model->createBrandInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateBrand() {
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
        $return = $this->BrandInformation_model->updateBrandInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function deleteBrand() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->BrandInformation_model->deleteBrand();
        $this->sendRestAPIResponse($return);
    }

    public function getBrandDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '') {
            redirect('User/login');
            return;
        }

        $return = $this->BrandInformation_model->getBrandDetail($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function searchBrandAlphabetically() {
        $all_brand_information = $this->BrandInformation_model->searchBrandAlphabetically();
        $this->sendRestAPIResponse($all_brand_information);
    }

    public function searchGenericAlphabetically() {
        $all_brand_information = $this->BrandInformation_model->searchGenericAlphabetically();
        $this->sendRestAPIResponse($all_brand_information);
    }

    public function getAllDrugInfoForAutoComplete() {
        $all_drug_info_for_auto_complete = $this->BrandInformation_model->getAllDrugInfoForAutoComplete();
        $this->sendRestAPIResponse($all_drug_info_for_auto_complete);
    }

    public function getNewProducts() {
        $all_drug_info = $this->BrandInformation_model->getNewProducts();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function getNewPresentations() {
        $all_drug_info = $this->BrandInformation_model->getNewPresentations();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function getNewBrands() {
        $all_drug_info = $this->BrandInformation_model->getNewBrands();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function getHighlightedBrands() {
        $all_drug_info = $this->BrandInformation_model->getHighlightedBrands();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function showAllNewProducts() {
        $data = array();
        $total_brand = $this->BrandInformation_model->getTotalNewData('Product');
        $data['TotalBrand'] = $total_brand;
        $all_new_brand = $this->BrandInformation_model->getAllNewData('Product');
        $data['AllBrands'] = $all_new_brand;
        $data['PageTitle'] = 'New Products';

        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('front-end/footer');
    }

    public function showAllNewBrands() {
        $data = array();
        $total_brand = $this->BrandInformation_model->getTotalNewData('Brand');
        $data['TotalBrand'] = $total_brand;
        $all_new_brand = $this->BrandInformation_model->getAllNewData('Brand');
        $data['AllBrands'] = $all_new_brand;
        $data['PageTitle'] = 'New Brands';

        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('front-end/footer');
    }

    public function showAllNewPresentations() {
        $data = array();
        $total_brand = $this->BrandInformation_model->getTotalNewData('Presentation');
        $data['TotalBrand'] = $total_brand;
        $all_new_brand = $this->BrandInformation_model->getAllNewData('Presentation');
        $data['AllBrands'] = $all_new_brand;
        $data['PageTitle'] = 'New Presentations';

        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('front-end/footer');
    }

    public function searchBrandInformation() {
        $option_type = $this->input->get('Type');
        $option_value = $this->input->get('Value');

        $data = array(
            'OptionType' => $option_type,
            'OptionValue' => $option_value
        );

        $this->load->view('front-end/header');
        $this->load->view('js/frontend-common-script');
        $this->load->view('front-end/main-menu');
        $this->load->view('js/frontend-drug-script');
        switch ($option_type) {
            case 'brand':
                $total_brand = $this->BrandInformation_model->getTotalSearchResult($option_type, $option_value);
                $data['TotalBrand'] = $total_brand;
                $all_new_brand = $this->BrandInformation_model->getSearchResult($option_type, $option_value);
                $data['AllBrands'] = $all_new_brand;
                $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_search');

                $this->load->view('front-end/search-result-drug', $data);
                break;
            case 'brand_by_alphabetically':
                $total_brand = $this->BrandInformation_model->getTotalSearchResult($option_type, $option_value);
                $data['TotalBrand'] = $total_brand;
                $all_new_brand = $this->BrandInformation_model->getSearchResult($option_type, $option_value);
                $data['AllBrands'] = $all_new_brand;
                $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_by_alphabetically_search');

                $this->load->view('front-end/search-result-drug-alphabetically', $data);
                break;
            case 'generic':
                list($data['BrandData'], $data['GenericData']) = $this->BrandInformation_model->getSearchResult($option_type, $option_value);
                $total_brand = $this->BrandInformation_model->getTotalSearchResult($option_type, $option_value);
                $data['TotalBrand'] = $total_brand;
                $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_generic_search');

                $this->load->view('front-end/search-result-generic', $data);
                break;
            case 'generic_by_alphabetically':
                $data['BrandData'] = $this->BrandInformation_model->getSearchResult($option_type, $option_value);
                $total_brand = $this->BrandInformation_model->getTotalSearchResult($option_type, $option_value);
                $data['TotalBrand'] = $total_brand;
                $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_generic_by_alphabetically_search');

                $this->load->view('front-end/search-result-generic-alphabetically', $data);
                break;
            case 'indication':
                $total_brand = $this->BrandInformation_model->getTotalSearchResult($option_type, $option_value);
                $data['TotalBrand'] = $total_brand;
                $all_new_brand = $this->BrandInformation_model->getSearchResult($option_type, $option_value);
                $data['AllIndications'] = $all_new_brand;
                $data['Indication'] = $option_value;
                $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_indication_search');

                $this->load->view('front-end/search-result-indication', $data);
                break;
            case 'manufacturer':
                $total_brand = $this->BrandInformation_model->getTotalSearchResult($option_type, $option_value);
                $data['TotalBrand'] = $total_brand;
                $all_new_brand = $this->BrandInformation_model->getSearchResult($option_type, $option_value);
                $data['AllManufacturers'] = $all_new_brand;
                $data['Manufacturer'] = $option_value;
                $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_manufacturer_search');

                $this->load->view('front-end/search-result-manufacturer', $data);
                break;
            default:
                break;
        }

        $this->load->view('front-end/footer');
    }

    public function getSearchResult() {
        $option_type = $this->input->get('Type');
        $option_value = $this->input->get('Value');
        $data = $this->BrandInformation_model->getSearchResultForFrontend($option_type, $option_value);

        $this->sendRestAPIResponse($data);
    }

    public function getTotalManufacturerBrand() {
        $data = $this->BrandInformation_model->getTotalManufacturerBrand();
        $this->sendRestAPIResponse($data);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}