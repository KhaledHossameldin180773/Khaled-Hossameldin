<?php
    require_once "M_MedicalHistory.php";

    class MedicalHistoryView
    {
        public function ShowAllMedicalHistory()
        {
            $result = MedicalHistory::SelectAllMedicalHistory();
            for($i=0; $i<count($result); $i++)
            {
                echo ("a href = C_MedicalHistory.php?id=".$result[$i]->ID.">".$result[$i]->Diagnosis."</a><br>");
            }
        }

        public function  ShowMedicalHistoryDetails($MedicalHistoryObject)
        {
            echo "<table border = 2> <tr><td>ID</td><td>".$MedicalHistoryObject->ID."</td></tr>";
            echo "<tr><td>MedicalHistory</td><td>".$MedicalHistoryObject->Diagnosis."</td></tr>";
            echo "</table>";
        }

        public function EditingMedicalHistoryDetails($MedicalHistoryObject)
        {
            echo "<table border = 2> <tr><td>ID</td><td>".$MedicalHistoryObject->ID."</td></tr>";
            $var = $MedicalHistoryObject->Diagnosis;
            echo "<tr><td>Medical History</td><td>".'<input type="text" name="name" value="'.$var.'">'."</td></tr>";
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

        }
    }

    if(array_key_exists('button1', $_POST))
    {
        button1(); 
    } 
    if(array_key_exists('button2', $_POST))
    {
        button2(); 
    } 
    if(array_key_exists('button3', $_POST))
    {
        button3(); 
    } 

    //AKTB HNA SAVE FOR EDited DATA
    function button1()
    { 
        
    } 
    function button2()
    { 
        
    } 
    function button3()
    { 
        
    } 

?>


