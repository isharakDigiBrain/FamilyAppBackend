<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . 'Routes' . DIRECTORY_SEPARATOR . 'IndexRoutes.php';

// DB connection class
include_once __DIR__ . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'dbconnect.php';

// header View
include_once __DIR__ . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . 'header.php';
// Global index varibales
$nav_page = false;

// program control
if (!$DB->IsSuccess) { // Check if DB error
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . 'DBError.php'; // show DB error
} else { // if No DB error Proceed below
   
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Session' . DIRECTORY_SEPARATOR . 'CheckSession.php'; // check session exists

    $showPage = false; //  page to be displayed
    $ArrayPage = [
        "Login", "Dashboard","Logout"
    ];

    if ($_SESSION) { // if session exists proceed with if
        if(isset($_POST['nav_page']) && $_POST['nav_page'] == 'LogoutPage'){
            $showPage = $ArrayPage[2];
        } else {
            $showPage = $ArrayPage[1];
        }
        
        include_once  SITE_ROOT_MODEL . 'role_auth.php'; //required
        // echo '<pre>';
        //  print_r($ResponseObject);
       
    } else { // if sesiion does not esist proceed with else
        $showPage = $ArrayPage[0];   //login    
    }   

    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . $showPage . '.php';
}

include_once __DIR__ . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . 'footer.php';
