<?php
include_once 'dbconnect.php';

class UserRoles extends dbconn
{
    // public function __construct()
    // {
    //     $this->initDBO();
    // }
    public $query =   
    "SELECT 
            * 
        FROM 
            `bi_user_role` 
    ";

    public function get_all_rows()
    {
        // global $DB;
        $Result = null;
        $db = $this->dblocal;
        try {

            $stmt = $db->prepare($this->query);              
            $stmt->execute();
            $Result = $stmt->fetchall(PDO::FETCH_ASSOC);
            
        } catch (PDOException $ex) {
            $Result = $ex->getMessage();               
        }
        return $Result;
        
    }

}
