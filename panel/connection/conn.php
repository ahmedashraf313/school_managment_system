<?php
class connection {

    protected $host = "localhost";
    protected $dbname = "school_managment_system";
    protected $user = "root";
    protected $pass = "1234";
    public $DBC;

    function __construct() {

        try {

            $this->DBC = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        }
        catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function closeConnection() {

        $this->DBC = null;
    }
    public function zone() {

    	date_default_timezone_set("Africa/Cairo");
       $now = date("Y-m-d h:i:s");
       return $now;
    }
}


?>
