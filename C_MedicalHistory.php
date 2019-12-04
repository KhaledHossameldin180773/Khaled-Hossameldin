<?php
    require_once "M_MedcialHistory.php";
    require_once "V_MedicalHistory.php";

    $MedicalHistoryView = new MedicalHistoryView();
    $MedicalHistoryObject = new MedicalHistory(1);
    $MedicalHistoryView->ShowMedicalHistoryDetails($MedicalHistoryObject);

    if(isset($_REQUEST["MHistoryID"]))
    {
        $MedicalHistoryObject = new MedicalHistory($_REQUEST["MHistoryID"]);
        $MedicalHistoryView->EditingMedicalHistoryDetails($MedicalHistoryObject);
    }

?>