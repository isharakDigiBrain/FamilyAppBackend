<?php include_once "loginautherization.php";

$sv = new LoginAuth();

if (isset($_POST['action'])) {
    if ($_POST["action"] == "GetUsersData") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $sv->login_user($username, $password);
        echo json_encode($data);
    }

   
}
