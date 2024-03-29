<?php
class ConnectionController 
{
    public $conn;
     public function __construct() {
        $dbhost = "localhost";
        $dbuser = 'root';
        $dbpass = "";
        $dbname = "employee_management1";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if(!$this->conn) {
            die("connection error : " . mysql_connect_error());
        }

     }
}