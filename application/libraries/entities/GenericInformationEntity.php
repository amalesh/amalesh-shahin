<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class GenericInformationEntity extends GeneralDataEntity
{
    public $GenericID;
    public $Name;
    public $Classification;
    public $SafetyRemark;
    public $Indication;
    public $DosageAdministration;
    public $ContraindicationPrecaution;
    public $SideEffect;
    public $PregnancyLactation;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->GenericID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
            $this->Classification = $data['Classification'];
            $this->SafetyRemark = $data['SafetyRemark'];
            $this->Indication = $data['Indication'];
            $this->DosageAdministration = $data['DosageAdministration'];
            $this->ContraindicationPrecaution = $data['ContraindicationPrecaution'];
            $this->SideEffect = $data['SideEffect'];
            $this->PregnancyLactation = $data['PregnancyLactation'];
        }
    }

    public function getGenericEntity() {
        $generic_data = parent::getGeneralDataEntity();
        $generic_data['GenericID'] = intval($this->GenericID);
        $generic_data['Name'] = addslashes($this->Name);
        $generic_data['Classification'] = addslashes($this->Classification);
        $generic_data['SafetyRemark'] = addslashes($this->SafetyRemark);
        $generic_data['Indication'] = addslashes($this->Indication);
        $generic_data['DosageAdministration'] = addslashes($this->DosageAdministration);
        $generic_data['ContraindicationPrecaution'] = addslashes($this->ContraindicationPrecaution);
        $generic_data['SideEffect'] = addslashes($this->SideEffect);
        $generic_data['PregnancyLactation'] = addslashes($this->PregnancyLactation);

        return $generic_data;
    }

    public function getGenericEntityForCreate() {
        $generic_data = parent::getGeneralDataEntityForCreate();
        $generic_data['Name'] = addslashes($this->Name);
        $generic_data['Classification'] = addslashes($this->Classification);
        $generic_data['SafetyRemark'] = addslashes($this->SafetyRemark);
        $generic_data['Indication'] = addslashes($this->Indication);
        $generic_data['DosageAdministration'] = addslashes($this->DosageAdministration);
        $generic_data['ContraindicationPrecaution'] = addslashes($this->ContraindicationPrecaution);
        $generic_data['SideEffect'] = addslashes($this->SideEffect);
        $generic_data['PregnancyLactation'] = addslashes($this->PregnancyLactation);

        return $generic_data;
    }

    public function getGenericEntityForUpdate() {
        $generic_data = parent::getGeneralDataEntityForUpdate();
        $generic_data['Name'] = addslashes($this->Name);
        $generic_data['Classification'] = addslashes($this->Classification);
        $generic_data['SafetyRemark'] = addslashes($this->SafetyRemark);
        $generic_data['Indication'] = addslashes($this->Indication);
        $generic_data['DosageAdministration'] = addslashes($this->DosageAdministration);
        $generic_data['ContraindicationPrecaution'] = addslashes($this->ContraindicationPrecaution);
        $generic_data['SideEffect'] = addslashes($this->SideEffect);
        $generic_data['PregnancyLactation'] = addslashes($this->PregnancyLactation);

        return $generic_data;
    }
}
