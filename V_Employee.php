<?php
    require_once 'M_Employee.php';
    require_once 'Connection.php';
    require_once 'C_Employee.php';

    class EmployeeView
    {
        public function ShowAllEmployees()
        {
            $result = Employee::SelectAllEmployees();
            for($i=0;$i<count($result);$i++)
            {
                echo ("<a href=C_Employee.php?ID=".$result[$i]->ID.">".$result[$i]->Name."</a><br>");
            }
        }

        public function ShowEmployeeDetails($EmployeeObject)
        {
            echo "<table border=2><tr><td>ID</td><td>".$EmployeeObject->ID."</td></tr>";
            echo "<tr><td>Full Name</td><td>".$EmployeeObject->Name."</td></tr>";
            echo "<tr><td>Phone Number</td><td>".$EmployeeObject->PhoneNumber."</td></tr>";
            echo "<tr><td>Address</td><td>".$EmployeeObject->Address."</td></tr>";
            echo "<tr><td>Birthdate</td><td>".$EmployeeObject->Birthdate."</td></tr>";
            echo "<tr><td>Shift Time</td><td>".$EmployeeObject->ShiftTime."</td></tr>";
            echo "<tr><td>Job Type</td><td>".$EmployeeObject->JobType."</td></tr>";
            echo "<tr><td>Salary</td><td>".$EmployeeObject->Salary."</td></tr>";
            echo "</table>";
        }

        public function EditingEmployeeDetails($EmployeeObject)
        {
            echo "<table border=2><tr><td>ID</td><td>".$EmployeeObject->ID."</td></tr>";
            $var = $EmployeeObject->name;
            echo "<tr><td>Employee Name</td><td>".'<input type="text" name="name" value="'.$var.'">'."</td></tr>";
            $var = $EmployeeObject->PhoneNumber;
            echo "<tr><td>Phone Number</td><td>".'<input type="number" name="number" value="'.$var.'">'."</td></tr>";
            $var = $EmployeeObject->Address;
            echo "<tr><td>Address</td><td>".'<input type="text" address="name" value="'.$var.'">'."</td></tr>";
            $var = $EmployeeObject->Birthdate;
            echo "<tr><td>Birthdate</td><td>".'<input type="date" name="birthdate" value="'.$var.'">'."</td></tr>";
            $var =$EmployeeObject->ShiftTime;
            echo "<tr><td>Shift Time</td><td>".'<input type="text" name="shifttime" value="'.$var.'">'."</td></tr>";
            $var =$EmployeeObject->JobType;
            echo "<tr><td>Job Type</td><td>".'<input type="text" name="jobtype" value="'.$var.'">'."</td></tr>";
            $var =$EmployeeObject->Salary;
            echo "<tr><td>Salary</td><td>".'<input type="text" name="salary" value="'.$var.'">'."</td></tr>";
            echo "</table>";
            echo "<br><br><br>"
            ?>
                <html>
                <form method="post"> 
                        <input type="submit" name="button1"
                                class="button" value="Add" /> 
                                <input type="submit" name="button3"
                                class="button" value="Delete" />
                                <input type="submit" name="button2"
                                class="button" value="Update" /> 

                    </form> 
                </html>
            <?php
            if(array_key_exists('button1', $_POST))
            {
                button1($EmployeeObject); 
            } 
            if(array_key_exists('button2', $_POST))
            {
                button2($EmployeeObject); 
            } 
            if(array_key_exists('button3', $_POST))
            {
                button3($EmployeeObject); 
            }
        }
    }


    function button1($EmployeeObject)
    { 
        $Model = new Employee();
        $Model->Name = $_POST['name'];
        $_Model->PhoneNumber = $_POST['number'];
        $Model->Birthdate = $_POST['birthdate'];
        $Model->ShiftTime = $_POST['shifttime'];
        $Model->Salary = $_POST['salary'];
        EmployeeControl::AddEmployee($EmployeeObject);
    } 
    function button2($EmployeeObject)
    { 
        EmployeeControl::UpddateEmployee($EmployeeObject);
    } 
    function button3($EmployeeObject)
    { 
        DoctorControl::DeleteDoctor($EmployeeObject->ID);
    } 

?>