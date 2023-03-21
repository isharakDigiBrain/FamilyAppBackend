<?php
include_once 'dbconnect.php';
session_start();
class LoginAuth extends dbconn
{


    // public function __construct()
    // {
    //     $this->initDBO();
    // }

    public function login_user($user_name, $user_password)
    {
        $db = $this->dblocal;
        try {
            $query = "SELECT * FROM bi_users WHERE username=:user_name AND password=:user_password";
            $stmt = $db->prepare($query);
            $stmt->bindParam('user_name', $user_name, PDO::PARAM_STR);
            $stmt->bindParam('user_password', $user_password, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {

                // $this->username = $row['username'];
                // $this->user_id = $row['id'];

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];


                // if ($row['id']) {
                //     $user_id = $row['id'];
                //     $query =
                //         "SELECT 
                //         URAccess.*
                //         , URole.name
                //         , URole.description
                //     FROM 
                //         bi_user_role_access  URAccess
                //     LEFT JOIN 
                //         bi_user_role URole ON URAccess.role_id = URole.id

                //     WHERE 
                //         user_id={$user_id} 
                //          ";
                //     $stmt = $db->prepare($query);
                //     $stmt->execute();
                //     $Result = $stmt->fetchall(PDO::FETCH_ASSOC);


                //     // echo json_encode($Result);
                //     // echo "<br>";
                //     // echo "<br>";


                //     // if($user_role_id){
                //     //     $query = "SELECT name FROM bi_user_role WHERE id=:role_id";
                //     //     $stmt = $db->prepare($query);
                //     //     $stmt->bindParam('role_id', $user_role_id, PDO::PARAM_STR);
                //     //     $stmt->execute();
                //     //     $user_role_name = $stmt->fetch(PDO::FETCH_ASSOC);

                //     // }

                // }

                // $_SESSION['user_role_id'] = $Result['role_id'];
                // $_SESSION['user_role_name'] = $Result['name'];
                // $_SESSION['user_role_name'] = $Result['description'];


                $row['message'] = 'login success.!';
                $row['status'] = 200;
            } else {
                $select = $db->prepare("SELECT * FROM bi_users WHERE username=:user_name");
                $select->bindparam(':user_name', $user_name);
                $select->execute();
                $stat1 = $select->fetchall(PDO::FETCH_ASSOC);
                if ($stat1) {
                    $row['message'] = 'Invalid password';
                    $row['status'] = 500;
                } else {
                    $row['message'] = 'Invalid username and password';
                    $row['status'] = 500;
                }
            }
            return $row;
        } catch (PDOException $ex) {
            $stat1 = $ex->getMessage();
            return $stat1;
        }
    }


    public function logout_user()
    {
        session_unset();
        session_destroy();
        $row['message'] = 'logout success.!';
        $row['status'] = 200;
        
        return $row;
        exit();
    }
}
