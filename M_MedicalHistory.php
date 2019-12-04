<?php

    require_once 'Connection.php';

    class MedicalHistory
    {
        public $ID;
        public $Diagnosis;
        public $PatientID;

        function __construct($ID)
        {
            $db = Database::getInstance();
            if ($ID != "") 
            {
                $sql = "SELECT * FROM `medicalhistory` WHERE PatID = $ID";
                $connection = Database::GetConnection();
                $MedicalHistoryDataset = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                if ($row = mysqli_fetch_array($MedicalHistoryDataset)) {
                    $this->ID = $row['MhistoryID'];
                    foreach ($row['DIagnosis'] as $x) {
                        $this->Diagnosis = array_push($this->Diagnosis, $x);
                    }
                    $this->PatientID = $row['PatientID'];
                }
            }
        }

        public static function SelectAllMedicalHistory()
        {
            $db = Database::getInstance();
            $sql = "SELECT * FROM `medicalhistory` ORDER BY DIagnosis";
            $connection = Database::GetConnection();
            $MedicalHistoryDataset = mysqli_query($connection, $sql) or die($connection);
            $i = 0;
            $result;
            while ($row = mysqli_fetch_array($MedicalHistoryDataset)) {
                $result[$i] = new MedicalHistory($row['MhistoryID']);
                $i++;
            }
            return $result;
        }
    }

?>