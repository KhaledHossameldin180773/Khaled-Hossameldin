<?php
    require_once 'M_Patient.php';
    require_once 'V_Patient.php';

    if(isset($_REQUEST["PatID"]))
    {
        $PatientObject = new Patient($_REQUEST["PatID"]);

        $PatientView->EditingPatientDetails($PatientObject);
    }

    class PatientControl
    {
        public static function AddPatient($PatientObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "INSERT INTO `patients`(`Patname`, `Patphone`, `Patbirthdate`, `Patbloodtype`, `Pathealthcareid`, `patlocalid`, `PatmedicalhistoryID`) VALUES ($PatientObject->Name,$PatientObject->PhoneNumber,$PatientObject->Birthdate,$PatientObject->BloodType,$PatientObject->HealthcareID, $PatientObject->LocalID, $PatientObject->MedicalDiagnosisID)";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function UpdatePatient($PatientObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $ID = $PatientObject->ID;
            $Name = $PatientObject->Name;
            $PhoneNumber = $PatientObject->PhoneNumber;
            $AddressID = $PatientObject->AddressID;
            $Address = $PatientObject->Address;
            $Birthdate = $PatientObject->Bithdate;
            $BloodType = $PatientObject->BloodType;
            $HealtcareID = $PatientObject->HealthcateID;
            $LocalID = $PatientObject->LocalID;
            $sql = "UPDATE `patients` SET `Patname`=$Name,`Patphone`=$PhoneNumber,`PataddressID`=$AddressID,`Patbirthdate`=$Birthdate,`Patbloodtype`=$BloodType,`PathealthcareID`=$HealtcareID,`PatlocalID`=$LocalID WHERE EmpID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function DeletePatient($ID)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "DELETE FROM `patients` WHERE PatID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }
    }
?>