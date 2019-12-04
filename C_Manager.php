<?php
    require_once "M_Manager.php";
    require_once "V_Manager.php";

    if(isset($_REQUEST["ManagerID"]))
    {
        $ManagerObject = new Manager($_REQUEST["ManagerID"]);
        $ManagerView->EditingManagerDetails($ManagerObject);
    }

    class ManagerControl
    {
        public static function AddManager($ManagerObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "INSERT INTO `manager`(`Managername`, `Managerphone`, `Managerbirthdate`, `Managershifttime`, `Managersalary`) VALUES ($ManagerObject->Name,$ManagerObject->PhoneNumber,$ManagerObject->Birthdate,$ManagerObject->ShiftTime,$ManagerObject->Salary)";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function UpdateManager($ManagerObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $ID = $ManagerObject->ID;
            $Name = $ManagerObject->Name;
            $PhoneNumber = $ManagerObject->PhoneNumber;
            $AddressID = $ManagerObject->AddressID;
            $Address = $ManagerObject->Address;
            $Birthdate = $ManagerObject->Bithdate;
            $ShiftTime = $ManagerObject->ShiftTime;
            $JobTypeID = $ManagerObject->JobTypeID;
            $JobType = $ManagerObject->JobType;
            $Salary = $ManagerObject->Salary;
            $sql = "UPDATE `manager` SET `Managername`=$Name,`Managerphone`=$PhoneNumber,`ManageraddressID`=$AddressID,`Managerbirthdate`=$Birthdate,`Managershifttime`=$ShiftTime,`ManagerjobtypeID`=$ShiftTime,`Managersalary`=$Salary WHERE ManagerID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function DeleteManager($ID)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "DELETE FROM `manager` WHERE ManagerID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }
    }
?>