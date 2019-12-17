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
                // if ($row = mysqli_fetch_all($MedicalHistoryDataset, MYSQLI_NUM)) {
                //     for ($i=0; $i < count($row); $i++) { 
                //         $this->ID[$i] = $row[$i][0];
                //         $this->Diagnosis[$i] = $row[$i][1];
                //     }
                //     $this->PatientID = $ID;
                // }
                $i = 0;
                while ($row = mysqli_fetch_array($MedicalHistoryDataset)) 
                {
                    $this->ID[$i] = $row['MhistoryID'];
                    $this->Diagnosis[$i] = $row['DIagnosis'];
                    $i++;
                }
                $this->PatientID = $ID;
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