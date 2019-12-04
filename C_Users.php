<?php
    require_once "M_Users.php";
    require_once "V_Users.php";

    $UsersView = new UsersView();
    $UsersView->ShowAllUsers($UsersObject);

    $UsersObject = new UsersView();

    $UsersView->ShowUsersDetails($UsersObject);

    if(isset($_REQUEST["UserID"]))
    {
        $UsersObject = new Users($_REQUEST["UserID"]);

        $UsersView->ShowUsersDetails($UsersObject);
    }
?>