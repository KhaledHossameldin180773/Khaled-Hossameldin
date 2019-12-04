<?php
    require_once 'M_JobType.php';
    class JobTypeView
    {
        public function ShowAllJobTypes()
        {
            $result = JobType::SelectAllJobTypes();
            for($i=0;$i<count($result);$i++)
            {
                echo ("<a href = C_JobType.php?ID=".$result[$i]->JobTypeName."</a><br>");
            }            
        }

        public function ShowJobTypeDetails($JobTypeObject)
        {
            echo "<table border=2><tr><td>ID</td><td>".$JobTypeObject->JobTypeID."</td></tr>";
            echo "<tr><td>Full Name</td><td>".$JobTypeObject->JobTypeName."</td></tr>";
            echo "</table>";
        }
    }
?>