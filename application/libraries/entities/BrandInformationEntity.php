<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class BrandInformationEntity extends GeneralDataEntity
{
    public $BrandID;
    public $Name;
    public $GenericID;
    public $ManufacturerID;
    public $DosageFormID;
    public $StrengthID;
    public $PackSizeID;
    public $PriceInBDT;
    public $IsHighlighted;
    public $IsNewProduct;
    public $IsNewBrand;
    public $IsNewPresentation;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->BrandID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
            $this->GenericID = $data['GenericID'];
            $this->ManufacturerID = $data['ManufacturerID'];
            $this->DosageFormID = $data['DosageFormID'];
            $this->StrengthID = $data['StrengthID'];
            $this->PackSizeID = $data['PackSizeID'];
            $this->PriceInBDT = $data['PriceInBDT'];
            $this->IsHighlighted = $data['IsHighlighted'];
            $this->IsNewProduct = $data['IsNewProduct'];
            $this->IsNewBrand = $data['IsNewBrand'];
            $this->IsNewPresentation = $data['IsNewPresentation'];
        }
    }

    public function getBrandEntity() {
        $brand_data = parent::getGeneralDataEntity();
        $brand_data['BrandID'] = intval($this->BrandID);
        $brand_data['Name'] = addslashes($this->Name);
        $brand_data['GenericID'] = intval($this->GenericID);
        $brand_data['ManufacturerID'] = intval($this->ManufacturerID);
        $brand_data['DosageFormID'] = intval($this->DosageFormID);
        $brand_data['StrengthID'] = intval($this->StrengthID);
        $brand_data['PackSizeID'] = intval($this->PackSizeID);
        $brand_data['PriceInBDT'] = floatval($this->PriceInBDT);
        $brand_data['IsHighlighted'] = intval($this->IsHighlighted);
        $brand_data['IsNewProduct'] = intval($this->IsNewProduct);
        $brand_data['IsNewBrand'] = intval($this->IsNewBrand);
        $brand_data['IsNewPresentation'] = intval($this->IsNewPresentation);

        return $brand_data;
    }

    public function getBrandEntityForCreate() {
        $brand_data = parent::getGeneralDataEntityForCreate();
        $brand_data['Name'] = addslashes($this->Name);
        $brand_data['GenericID'] = intval($this->GenericID);
        $brand_data['ManufacturerID'] = intval($this->ManufacturerID);
        $brand_data['DosageFormID'] = intval($this->DosageFormID);
        $brand_data['StrengthID'] = intval($this->StrengthID);
        $brand_data['PackSizeID'] = intval($this->PackSizeID);
        $brand_data['PriceInBDT'] = floatval($this->PriceInBDT);
        $brand_data['IsHighlighted'] = intval($this->IsHighlighted);
        $brand_data['IsNewProduct'] = intval($this->IsNewProduct);
        $brand_data['IsNewBrand'] = intval($this->IsNewBrand);
        $brand_data['IsNewPresentation'] = intval($this->IsNewPresentation);

        return $brand_data;
    }

    public function getBrandEntityForUpdate() {
        $brand_data = parent::getGeneralDataEntityForUpdate();
        $brand_data['Name'] = addslashes($this->Name);
        $brand_data['GenericID'] = intval($this->GenericID);
        $brand_data['ManufacturerID'] = intval($this->ManufacturerID);
        $brand_data['DosageFormID'] = intval($this->DosageFormID);
        $brand_data['StrengthID'] = intval($this->StrengthID);
        $brand_data['PackSizeID'] = intval($this->PackSizeID);
        $brand_data['PriceInBDT'] = floatval($this->PriceInBDT);
        $brand_data['IsHighlighted'] = intval($this->IsHighlighted);
        $brand_data['IsNewProduct'] = intval($this->IsNewProduct);
        $brand_data['IsNewBrand'] = intval($this->IsNewBrand);
        $brand_data['IsNewPresentation'] = intval($this->IsNewPresentation);

        return $brand_data;
    }
}
