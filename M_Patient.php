<?php
    require_once 'Connection.php';
    require_once 'M_Address.php';
    require_once 'M_JobType.php';
    require_once 'M_MedicalHistory.php';

    class Patient
    {
        public $ID;
        public $Name;
        public $PhoneNumber;
        public $AddressID;
        public $Address;
        public $Birthdate;
        public $BloodType;
        public $HealthCareID;
        public $LocalID;
        public $MedicalDiagnosisID;
        public $MedicalDiagnosisObj;

        function construct_id($ID)
        {
            $db = Database::GetConnection();
            if ($ID != "") 
            {
                $sql = "SELECT * FROM `patients` WHERE PatID = $ID";
                $connecntion = Database::GetConnection();
                $PatientDataset = mysqli_query($connecntion, $sql) or die(mysqli_error());
                if($row = mysqli_fetch_array($PatientDataset))
                {
                    $this->Name = $row['Patname'];
                    $this->PhoneNumber = $row['Patphone'];
                    $this->AddressID = $row['pataddressID'];
                    $Temp = new Address($row['PataddressID']);
                    $this->Address = $Temp->Address;
                    $this->Birthdate = $row['Patbirthdate'];
                    $this->BloodType = $row['Patbloodtype'];
                    $this->HealthCareID = $row['PathealthcareID'];
                    $this->LocalID = $row['PatlocalID'];
                    $Temp = new MedicalHistory($row['PatmedicalhistoryID']);
                    for ($i=0; $i < count($Temp); $i++) { 
                        $this->MedicalDiagnosisObj[$i] = $Temp[$i];
                    }
                }
            }
        }

        public static function SelectAllPatients()
        {
            $db = Database::getInstance();
            $connecntion = Database::GetConnection();
            $sql = "SELECT * FROM `patients` ORDER BY Patname";
            $PatientDataset = mysqli_query($connecntion, $sql) or die(mysql_error());
            $i = 0;
            $result;
            while($row = mysqli_fetch_array($PatientDataset))
            {
                $result[$i] = new Patient($row['PatID']);
                $i++;
            }
            return $result;
        }
    }

?>