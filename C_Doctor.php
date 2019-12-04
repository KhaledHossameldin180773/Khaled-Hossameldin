<?php
    require_once 'M_Doctor.php';
    require_once 'V_Doctor.php';
    require_once 'Connection.php';

    if(isset($_REQUEST['DocID']))
    {
        $DoctorObject = new Doctor($_REQUEST['DocID']);
        $DoctorView->EditingDoctorDetails($DoctorObject);
    }

    class DoctorControl
    {
        public static function AddDotor($DoctorObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "INSERT INTO `doctors`(`Docname`, `Docphone`, `Docbirthdate`, `Docshifttime`, `Docsalary`) VALUES ($DoctorObject->Name,$DoctorObject->PhoneNumber,$DoctorObject->Birthdate,$DoctorObject->ShiftTime,$DoctorObject->Salary)";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function UpdateDoctor($DoctorObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $ID = $DoctorObject->ID;
            $Name = $DoctorObject->Name;
            $PhoneNumber = $DoctorObject->PhoneNumber;
            $AddressID = $DoctorObject->AddressID;
            $Address = $DoctorObject->Address;
            $Birthdate = $DoctorObject->Bithdate;
            $ShiftTime = $DoctorObject->ShiftTime;
            $JobTypeID = $DoctorObject->JobTypeID;
            $JobType = $DoctorObject->JobType;
            $Salary = $DoctorObject->Salary;
            $sql = "UPDATE `doctors` SET `Docname`=$Name,`Docphone`=$PhoneNumber,`DocaddressID`=$AddressID,`Docbirthdate`=$Birthdate,`Docshifttime`=$ShiftTime,`DocjobtypeID`=$ShiftTime,`Docsalary`=$Salary WHERE DocID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function DeleteDoctor($ID)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "DELETE FROM `doctors` WHERE DocID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }
    }

?>