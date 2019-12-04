<?php
    require_once "M_UserType.php";
    require_once "V_UserType.php";

    $UserTypeView = new UserTypeView();
    $UserTypeView->ShowAllUserTypes($UserTypeObject);

    $UserTypeObject = new UserType(1);

    $UserTypeView->ShowUserTypeDetails($UserTypeObject);

    if(isset($_REQUEST["UserTypeID"]))
    {
        $UserTypeObject = new UserType($_REQUEST["UserTypeID"]);
        $UserTypeView->ShowUserTypeDetails($UserTypeObject);
    }
?>