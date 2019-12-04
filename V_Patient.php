<?php
    require_once 'M_Patient.php';
    require_once 'Connection.php';
    require_once 'C_Patient.php';

    class PatientView
    {
        public function ShowAllPatients()
        {
            $result = Patient::SelectAllPatients();
            for($i=0;$i<count($result);$i++)
            {
                echo ("<a href=C_Patient.php?id=".$result[$i]->ID.">".$result[$i]->Name."</a><br>");
            }
        }

        public function ShowPatientDetails($PatientObject)
        {
            echo "<table border=2><tr><th>ID</th><td>".$PatientObject->ID."</td></tr>";
            echo "<tr><th>Full Name</th><td>".$PatientObject->Name."</td></tr>";
            echo "<tr><th>Phone Number</th><td>".$PatientObject->PhoneNumber."</td></tr>";
            echo "<tr><th>Address</th><td>".$PatientObject->Address."</td></tr>";
            echo "<tr><th>Birthdate</th><td>".$PatientObject->Birthdate."</td></tr>";
            echo "<tr><th>Blood Type</th><td>".$PatientObject->BloodType."</td></tr>";
            echo "<tr><th>Healthcare ID</th><td>".$PatientObject->HealthCareID."</td></tr>";
            echo "<tr><th>Local ID</th><td>".$PatientObject->LocalID."</td></tr>";
            echo "<tr><td>Medical History</td><td>";
            for($i=0;$i<count($PatientObject->MedicalDiagnosisObj);$i++)
            {
                echo "<br>".$PatientObject->MedicalDiagnosisObj[$i];
            }
            echo "</td></tr>";
            echo "</table>";
        }
        public function EditingPatientDetails($PatientObject)
        {  
            
            echo "<table border=2><tr><th>ID</th><td>".$PatientObject->ID."</td></tr>";
            $var =$PatientObject->Name;
            echo "<tr><th>Patient Name</th><td>".'<input type="text" name="name" value="'.$var.'">'."</td></tr>";
            $var =$PatientObject->PhoneNumber;
            echo "<tr><th>Phone Number</th><td>".'<input type="number" name="phonenumber" value="'.$var.'">'."</td></tr>";
            $var =$PatientObject->Address;
            echo "<tr><th>Address</th><td>".'<input type="text" name="addresss" value="'.$var.'">'."</td></tr>";
            $var =$PatientObject->Birthdate;
            echo "<tr><th>Birthdate</th><td>".'<input type="date" name="birthdate" value="'.$var.'">'."</td></tr>";
            $var =$PatientObject->BloodType;
            echo "<tr><th>Blood Type</th><td>".'<input type="text" name="bloodtype" value="'.$var.'">'."</td></tr>";
            $var =$PatientObject->HealthcareID;
            echo "<tr><th>Healtcare ID</th><td>".'<input type="number" name="healthcareid" value="'.$var.'">'."</td></tr>";
            $var =$PatientObject->LocalID;
            echo "<tr><th>Local ID</th><td>".'<input type="number" name="localid" value="'.$var.'">'."</td></tr>";
            echo "<tr><th>Medical Diagnosis</th><td>";
            foreach ($PatientObject->MedicalDiagnosisObj as $x) {
                echo $x;
            }
            echo "</td></tr>";
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
                button1($PatientObject); 
            } 
            if(array_key_exists('button2', $_POST))
            {
                button2($PatientObject); 
            } 
            if(array_key_exists('button3', $_POST))
            {
                button3($PatientObject); 
            }
        }
    }

    function button1($PatientObject)
    { 
        $Model = new Patient();
        $Model->Name = $_POST['name'];
        $_Model->PhoneNumber = $_POST['number'];
        $Model->Birthdate = $_POST['birthdate'];
        $Model->BloodType = $_POST['bloodtype'];
        $Model->HealthCareID = $_POST['healthcareid'];
        $Model->LocalID = $_POST['localid'];
        PatientControl::AddPatient($PatientObject);
    }

    function button2($PatientObject)
    { 
        DoctorControl::UpdateDoctor($PatientObject);
    } 

    function button3($PatientObject)
    { 
        DoctorControl::DeleteDoctor($PatientObject->ID);
    }

?>