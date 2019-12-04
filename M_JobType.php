<?php
    //requiring database place and foreign key tables
    require_once 'Connection.php';
    class JobType
    {
        public $JobTypeID;
        public $JobTypeName;

        function construct_id($ID)
        {
            //Database Connection place
            $db = Database::getInstance();
            if($ID != "")
            {
                $sql = "SELECT * FROM `jobtype` WHERE JobtypeID = $ID";
                $connection = Database::GetConnection();
                $JobTypeDataset = mysqli_query($connection, $sql) or die(mysqli_error());
                if($row = mysqli_fetch_array($JobTypeDataset))
                {
                    $this->JobTypeID = $row['JobtypeID'];
                    $this->JobTypeName = $row['jobtypename'];
                }
            }
        }

        public Static function SelectAllJobTypes()
        {
            $connection = Database::GetConnection();
            $sql = "SELECT * FROM `jobtype` ORDER BY jobtypename";
            $JobTypeDataset = mysqli_query($connection, $sql) or die(mysqli_error());
            $i = 0;
            $result;
            while($row = mysqli_fetch_array($JobTypeDataset))
            {
                $result[$i] = new JobType($row['JobtypeID']);
                $i++;
            }
            return $result;
        }
    }
?>