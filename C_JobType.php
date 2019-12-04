<?php
    require_once 'M_JobType.php';
    require_once 'V_JobType.php';

    $JobTypeView = new JobTypeView();
    $JobTypeView->ShowAllJobTypes();

    $JobTypeObject = new JobType(2);

    $JobTypeView->ShowAllJobTypes($JobTypeObject);

    if(isset($_REQUEST["JobTypeID"]))
    {
        $JobTypeObject = new JobType($_REQUEST["JobTypeID"]);

        $JobTypeView->ShowAllJobTypes($JobTypeObject);
    }
?>