<?php
    require_once 'M_Employee.php';
    require_once 'V_Employee.php';

    if(isset($_REQUEST["EmpID"]))
    {
        $EmployeeObject = new Employee($_REQUEST["EmpID"]);
        $EmployeeView->EditingEmployeeDetails($EmployeeObject);
    }

    class EmployeeControl
    {
        public static function AddEmployee($EmployeeObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "INSERT INTO `employees`(`Empname`, `Empphone`, `Empbirthdate`, `Empshifttime`, `Empsalary`) VALUES ($EmployeeObject->Name,$EmployeeObject->PhoneNumber,$EmployeeObject->Birthdate,$EmployeeObject->ShiftTime,$EmployeeObject->Salary)";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function UpddateEmployee($EmployeeObject)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $ID = $EmployeeObject->ID;
            $Name = $EmployeeObject->Name;
            $PhoneNumber = $EmployeeObject->PhoneNumber;
            $AddressID = $EmployeeObject->AddressID;
            $Address = $EmployeeObject->Address;
            $Birthdate = $EmployeeObject->Bithdate;
            $ShiftTime = $EmployeeObject->ShiftTime;
            $JobTypeID = $EmployeeObject->JobTypeID;
            $JobType = $EmployeeObject->JobType;
            $Salary = $EmployeeObject->Salary;
            $sql = "UPDATE `employees` SET `Empname`=$Name,`Empphone`=$PhoneNumber,`EmpaddressID`=$AddressID,`Empbirthdate`=$Birthdate,`Empshifttime`=$ShiftTime,`EmpjobtypeID`=$ShiftTime,`Empsalary`=$Salary WHERE EmpID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }

        public static function DeleteEmployee($ID)
        {
            $db = Database::getInstance();
            $connection = Database::GetConnection();
            $sql = "DELETE FROM `employees` WHERE EmpID = $ID";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
        }
    }
?>