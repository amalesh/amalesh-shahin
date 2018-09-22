<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class DoctorInformationEntity extends GeneralDataEntity
{
    public $DoctorID;
    public $Name;
    public $Specialization;
    public $ProfessionDegree;
    public $Gender;
    public $HomeAddressID;
    public $ChamberAddressID;
    public $PhoneNo;
    public $MobileNo1;
    public $MobileNo2;
    public $MobileNo3;
    public $Hotline;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->DoctorID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
            $this->Specialization = $data['Specialization'];
            $this->ProfessionDegree = $data['ProfessionDegree'];
            $this->Gender = $data['Gender'];
            $this->HomeAddressID = $data['HomeAddressID'];
            $this->ChamberAddressID = $data['ChamberAddressID'];
            $this->PhoneNo = $data['PhoneNo'];
            $this->MobileNo1 = $data['MobileNo1'];
            $this->MobileNo2 = $data['MobileNo2'];
            $this->MobileNo3 = $data['MobileNo3'];
            $this->Hotline = $data['Hotline'];
        }
    }

    public function getDoctorInformationEntity() {
        $doctor_data = parent::getGeneralDataEntity();
        $doctor_data['DoctorID'] = intval($this->DoctorID);
        $doctor_data['Name'] = addslashes($this->Name);
        $doctor_data['Specialization'] = addslashes($this->Specialization);
        $doctor_data['ProfessionDegree'] = addslashes($this->ProfessionDegree);
        $doctor_data['Gender'] = (string)$this->Gender;
        $doctor_data['HomeAddressID'] = intval($this->HomeAddressID);
        $doctor_data['ChamberAddressID'] = intval($this->ChamberAddressID);
        $doctor_data['PhoneNo'] = (string)$this->PhoneNo;
        $doctor_data['MobileNo1'] = (string)$this->MobileNo1;
        $doctor_data['MobileNo2'] = (string)$this->MobileNo2;
        $doctor_data['MobileNo3'] = (string)$this->MobileNo3;
        $doctor_data['Hotline'] = (string)$this->Hotline;

        return $doctor_data;
    }

    public function getDoctorEntityForCreate() {
        $doctor_data = parent::getGeneralDataEntityForCreate();
        $doctor_data['Name'] = addslashes($this->Name);
        $doctor_data['Specialization'] = addslashes($this->Specialization);
        $doctor_data['ProfessionDegree'] = addslashes($this->ProfessionDegree);
        $doctor_data['Gender'] = (string)$this->Gender;
        $doctor_data['HomeAddressID'] = intval($this->HomeAddressID);
        $doctor_data['ChamberAddressID'] = intval($this->ChamberAddressID);
        $doctor_data['PhoneNo'] = (string)$this->PhoneNo;
        $doctor_data['MobileNo1'] = (string)$this->MobileNo1;
        $doctor_data['MobileNo2'] = (string)$this->MobileNo2;
        $doctor_data['MobileNo3'] = (string)$this->MobileNo3;
        $doctor_data['Hotline'] = (string)$this->Hotline;
        return $doctor_data;
    }

    public function getDoctorEntityForUpdate() {
        $doctor_data = parent::getGeneralDataEntityForUpdate();
        $doctor_data['Name'] = addslashes($this->Name);
        $doctor_data['Specialization'] = addslashes($this->Specialization);
        $doctor_data['ProfessionDegree'] = addslashes($this->ProfessionDegree);
        $doctor_data['Gender'] = (string)$this->Gender;
        $doctor_data['HomeAddressID'] = intval($this->HomeAddressID);
        $doctor_data['ChamberAddressID'] = intval($this->ChamberAddressID);
        $doctor_data['PhoneNo'] = (string)$this->PhoneNo;
        $doctor_data['MobileNo1'] = (string)$this->MobileNo1;
        $doctor_data['MobileNo2'] = (string)$this->MobileNo2;
        $doctor_data['MobileNo3'] = (string)$this->MobileNo3;
        $doctor_data['Hotline'] = (string)$this->Hotline;
        return $doctor_data;
    }
}
