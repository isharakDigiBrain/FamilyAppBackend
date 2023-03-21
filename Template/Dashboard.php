<?php


//role controller
$Role = $ResponseObject->defaultPage;
$RoleDescription =  $ResponseObject->defaultPageDescription;
if (isset($_POST['Role'])) {
    $Role =  $_POST['Role'];
    $RoleDescriptionKey = array_search($Role, array_column($ResponseObject->RoleAccess, 'name'));
    $RoleDescription  = $ResponseObject->RoleAccess[$RoleDescriptionKey]->description;
    //echo   '$RoleDescription';
  //  echo   $RoleDescription;
}



//page controller
// if (isset($_POST['nav_page'])) {
//     $nav_page = $_POST['nav_page'];
//     $LoadPage =  $nav_page;
// } else {
//     $LoadPage = 'dashboard_index'; //default
// }



?>

<?php
include_once SITE_ROOT_TEMPLATE . 'topbar.php';
include_once SITE_ROOT_TEMPLATE . 'sidebar.php';
?>
    <?php

    if (isset($_POST['nav_page'])) {
        $nav_page = $_POST['nav_page'];
        $LoadPage =  $nav_page;
        include_once SITE_ROOT_ROLE . $Role . WS .$LoadPage. '.php';
    } 
    else {
        $LoadPage = 'dashboard_index'; //default
        include_once SITE_ROOT_TEMPLATE . $LoadPage . '.php';
    }

    ?>
<?php
include_once SITE_ROOT_TEMPLATE . 'DashboardJs.php';
?>