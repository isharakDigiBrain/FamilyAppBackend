<?php 
    include_once "role_autherization_model.php";
   // include_once "role_model.php";

    if (!isset($_SESSION['user_id'])) {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    $RoleAuth = new RoleAuth();
    //$AllRoles = new UserRoles();

    $ResponseObject = new stdClass();

    $user_id = $_SESSION['user_id'];
    $username  = $_SESSION['username'];

    $data = $RoleAuth->role_autherization($user_id, $username);
    $CopyData = $data;
    $defaultData =  array_shift( $data);    
    $ResponseObject->RoleAccess = $CopyData;
    $ResponseObject->IsRoleAccess = true;
    $ResponseObject->defaultPage = $defaultData->name;
    $ResponseObject->defaultPageDescription = $defaultData->description;
    $ResponseObject->SwitchRole =  array_column($CopyData, 'name');



    return $ResponseObject;
