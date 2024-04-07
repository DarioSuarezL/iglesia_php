<?php

    namespace App\Models;

    use mysqli;

    class Model{
        protected $db_host = DB_HOST;
        protected $db_user = DB_USER;
        protected $db_pass = DB_PASS;
        protected $db_name = DB_NAME;
        protected $conn;

        public function __construct()
        {
            $this->connection();
        }


        public function connection(){
            $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if($this->conn->connect_error){
                die("Connection failed: " . $this->conn->connect_error);
            }
            // echo "Connected successfully <br> PORT:3306";
        }
    }