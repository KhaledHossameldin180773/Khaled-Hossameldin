<?php
    require_once 'M_Doctor.php';
    require_once 'Connection.php';
    require_once 'C_Doctor';

    class DoctorView
    {
        public function ShowAllDoctors()
        {
            $result = Doctor::SelectAllDoctors();
            for($i=0;$i<count($result);$i++)
            {
                echo ("<a href = C_Doctor.php?ID=".$result[$i]->ID.">".$result[$i]->Name."</a><br>");
            }            
        }

        public function ShowDoctorDetails($DoctorObject)
        {  
            echo "<table border=2><tr><td>ID</td><td>".$DoctorObject->ID."</td></tr>";
            echo "<tr><td>Full Name</td><td>".$DoctorObject->Name."</td></tr>";
            echo "<tr><td>Phone Number</td><td>".$DoctorObject->PhoneNumber."</td></tr>";
            echo "<tr><td>Address</td><td>".$DoctorObject->Address."</td></tr>";
            echo "<tr><td>Birthdate</td><td>".$DoctorObject->Birthdate."</td></tr>";
            echo "<tr><td>Shift Time</td><td>".$DoctorObject->ShiftTime."</td></tr>";
            echo "<tr><td>Job Type</td><td>".$DoctorObject->JobType."</td></tr>";
            echo "<tr><td>Salary</td><td>".$DoctorObject->Salary."</td></tr>";
            echo "</table>";
        }

        public function EditingDoctorDetails($DoctorObject)
        {  
            
            echo "<table border=2><tr><th>ID</th><td>".$DoctorObject->ID."</td></tr>";
            $var =$DoctorObject->Name;
            echo "<tr><th>Doctor Name</th><td>".'<input type="text" name="name" value="'.$var.'">'."</td></tr>";
            $var =$DoctorObject->PhoneNumber;
            echo "<tr><th>Phone Number</th><td>".'<input type="number" name="phonenumber" value="'.$var.'">'."</td></tr>";
            $var =$DoctorObject->Address;
            echo "<tr><th>Address</th><td>".'<input type="text" name="addresss" value="'.$var.'">'."</td></tr>";
            $var =$DoctorObject->Birthdate;
            echo "<tr><th>Birthdate</th><td>".'<input type="date" name="birthdate" value="'.$var.'">'."</td></tr>";
            $var =$DoctorObject->ShiftTime;
            echo "<tr><th>Shift Time</th><td>".'<input type="text" name="shofttime" value="'.$var.'">'."</td></tr>";
            $var =$DoctorObject->JobType;
            echo "<tr><th>Job Type</th><td>".'<input type="text" name="jobtype" value="'.$var.'">'."</td></tr>";
            $var =$DoctorObject->Salary;
            echo "<tr><th>Salary</th><td>".'<input type="text" name="salary" value="'.$var.'">'."</td></tr>";
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
                button1($DoctorObject); 
            } 
            if(array_key_exists('button2', $_POST))
            {
                button2($DoctorObject); 
            } 
            if(array_key_exists('button3', $_POST))
            {
                button3($DoctorObject); 
            }
        }
    }

    
    function button1($DoctorObject)
    { 
        $Model = new Doctor();
        $Model->Name = $_POST['name'];
        $_Model->PhoneNumber = $_POST['number'];
        $Model->Birthdate = $_POST['birthdate'];
        $Model->ShiftTime = $_POST['shifttime'];
        $Model->Salary = $_POST['salary'];
        DoctorControl::AddDotor($DoctorObject);
    } 
    function button2($DoctorObject)
    { 
        DoctorControl::UpdateDoctor($DoctorObject);
    } 
    function button3($DoctorObject)
    { 
        DoctorControl::DeleteDoctor($DoctorObject->ID);
    } 

?>


