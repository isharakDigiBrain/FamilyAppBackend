<?php
include_once 'dbconnect.php';

class RoleAuth extends dbconn
{
    private $username;
    private $user_id;

    private $query =
        "   SELECT 
            URAccess.*
            , URole.name
            , URole.description
            , URole.priority

        FROM 
            bi_user_role_access  URAccess
        LEFT JOIN 
            bi_user_role URole ON URAccess.role_id = URole.id
        WHERE 
            URAccess.user_id=@UserID 
        ORDER BY 
            URole.priority ASC
        ";


    public  function role_autherization($user_id, $user_name)
    {
        $db = $this->dblocal;
        try {
            $this->username =  $user_name;
            $this->user_id =  $user_id;
            if ($this->user_id) {
                //$declare = " SET  @UserID :={$user_id};";
                // $query =  $declare . $this->query;
                $query = "SELECT 
                        URAccess.*
                        , URole.name
                        , URole.description
                        , URole.priority 
                       
                    FROM 
                        bi_user_role_access  URAccess
                    LEFT JOIN 
                        bi_user_role URole ON URAccess.role_id = URole.id
                    WHERE 
                        URAccess.user_id={$this->user_id} 
                        ORDER BY URole.priority ASC
                        ";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $Result = $stmt->fetchall(PDO::FETCH_OBJ);
            }


            return $Result;
        } catch (PDOException $ex) {
            $stat1 = $ex->getMessage();
            return $stat1;
        }
    }
}
