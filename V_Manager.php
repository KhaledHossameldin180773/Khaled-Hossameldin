<?php
    require_once "M_Manager.php";

    class ManagerView
    {
        public function ShowAllManagers()
        {
            $result = Manager::SelectManagers();
            for($i=0; $i<count($result); $i++)
            {
                echo ("a href = C_Manager.php?id=".$result[$i]->ID.">".$result[$i]->Name."</a><br>");
            }
        }

        public function  ManagerDetails($ManagerObject)
        {
            echo "<table border = 2> <tr><td>ID</td><td>".$ManagerObject->ID."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->Name."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->Phone."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->AddressID."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->BirthDate."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->ShiftTime."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->JobTypeID."</td></tr>";
            echo "<tr><td>Manager</td><td>".$ManagerObject->Salary."</td></tr>";
            echo "</table>";
        }

        public function EditingManagerDetails($ManagerObject)
        {
            echo "<table border = 2> <tr><td>ID</td><td>".$ManagerObject->ID."</td></tr>";
            $var =$ManagerObject->Name;
            echo "<tr><td>Manager Name</td><td>".'<input type="text" name="name" value="'.$var.'">'."</td></tr>";
            $var =$ManagerObject->PhoneNumber;
            echo "<tr><td>Phone Number</td><td>".'<input type="number" name="number" value="'.$var.'">'."</td></tr>";
            $var =$ManagerObject->Address;
            echo "<tr><td>Address</td><td>".'<input type="text" name="address" value="'.$var.'">'."</td></tr>";
            $var =$ManagerObject->Birthdate;
            echo "<tr><td>Birthdate</td><td>".'<input type="date" name="birthdate" value="'.$var.'">'."</td></tr>";
            $var =$ManagerObject->ShiftTime;
            echo "<tr><td>Shift Time</td><td>".'<input type="text" name="shofttime" value="'.$var.'">'."</td></tr>";
            $var =$ManagerObject->JobType;
            echo "<tr><td>Job Type</td><td>".'<input type="text" name="jobtype" value="'.$var.'">'."</td></tr>";
            $var =$ManagerObject->Salary;
            echo "<tr><td>Salary</td><td>".'<input type="number" name="salary" value="'.$var.'">'."</td></tr>";
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
                button1($ManagerObject); 
            } 
            if(array_key_exists('button2', $_POST))
            {
                button2($ManagerObject); 
            } 
            if(array_key_exists('button3', $_POST))
            {
                button3($ManagerObject); 
            }
        }
    }

    
    function button1($ManagerObject)
    { 
        $Model = new Manager();
        $Model->Name = $_POST['name'];
        $_Model->PhoneNumber = $_POST['number'];
        $Model->Birthdate = $_POST['birthdate'];
        $Model->ShiftTime = $_POST['shifttime'];
        $Model->Salary = $_POST['salary'];
        ManagerControl::AddManager($ManagerObject);
    } 
    function button2($ManagerObject)
    { 
        ManagerControl::UpdateManager($ManagerObject);
    } 
    function button3($ManagerObject)
    { 
        ManagerControl::DeleteManager($ManagerObject->ID);
    } 

?>


