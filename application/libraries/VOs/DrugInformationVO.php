<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DrugInformationVO
{
    public function getAddressCategoryVO (DrugInformationEntity $drugInformationEntity){
        $vo = array();
        $vo['DrugID'] = intval($drugInformationEntity->DrugID);
        $vo['GenericID'] = intval($drugInformationEntity->GenericID);
        $vo['BrandID'] = intval($drugInformationEntity->BrandID);
        $vo['ClassificationID'] = intval($drugInformationEntity->ClassificationID);
        $vo['ManufacturerID'] = intval($drugInformationEntity->ManufacturerID);
        $vo['SafetyRemarkID'] = intval($drugInformationEntity->SafetyRemarkID);
        $vo['DosageFormID'] = intval($drugInformationEntity->DosageFormID);
        $vo['StrengthID'] = intval($drugInformationEntity->StrengthID);
        $vo['PackSizeID'] = intval($drugInformationEntity->PackSizeID);
        $vo['PriceInBDT'] = floatval($drugInformationEntity->PriceInBDT);
        $vo['Indication'] = addslashes($drugInformationEntity->Indication);
        $vo['DosageAdministration'] = addslashes($drugInformationEntity->DosageAdministration);
        $vo['ContraindicationPrecaution'] = addslashes($drugInformationEntity->ContraindicationPrecaution);
        $vo['SideEffect'] = addslashes($drugInformationEntity->SideEffect);
        $vo['PregnancyLactation'] = addslashes($drugInformationEntity->PregnancyLactation);
        return $vo;
    }
}