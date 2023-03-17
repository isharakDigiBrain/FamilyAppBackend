<?php
$dbuserx = 'root'; // change with your own database username
$dbpassx = ''; // change with your own database password
class dbconn
{
    public $dblocal;
    public $IsSuccess;
    public $Messsage;
    public function __construct()
    {
        $this-> initDBO();
    }
    public function initDBO()
    {
        global $dbuserx, $dbpassx;
        try {
            $this->dblocal = new PDO('mysql:host=localhost;dbname=fam_app;charset=utf8mb4',  $dbuserx, $dbpassx);
            $this->dblocal->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->IsSuccess =  true;
        } catch (PDOException $e) {
            $this->IsSuccess =  false;
            $this->Messsage = "DB connection failed contact Website Administrator.";
        }

    }

}

$database = new dbconn();
$DB = &$database;
?>
