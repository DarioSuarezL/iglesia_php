<?php

    namespace App\Models;

    use mysqli;

    class Model{
        protected $db_host = DB_HOST;
        protected $db_user = DB_USER;
        protected $db_pass = DB_PASS;
        protected $db_name = DB_NAME;
        protected $conn;
        protected $query;

        //Pa que no se maree el intelliphense
        protected $table;

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

        public function query($sql){
            $sql = $this->conn->real_escape_string($sql);
            $this->query = $this->conn->query($sql);

            return $this;
        }

        public function get(){
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }

        public function first(){
            return $this->query->fetch_assoc();
        }

        // consultas prearmadas

        public function all(){
            $sql = "SELECT * FROM {$this->table}";
            return $this->query($sql)->get();
            // return $this;
        }

        public function find($id){
            $id = $this->conn->real_escape_string($id);
            $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
            return $this->query($sql)->first();
        }

        public function where($column, $operator, $value = null){
            // return $memberModel->where('numero_celular','>' ,65085392)->get();
            if($value === null){
                $value =  $this->conn->real_escape_string($operator);
                $operator = '=';
            }else{
                $value = $this->conn->real_escape_string($value);
                $operator = $this->conn->real_escape_string($operator);
            }

            $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} '{$value}'";
            $this->query($sql);

            return $this;
        }


        public function create($data){
            $columns = implode(',', array_keys($data));
            $values = "'".implode("','", array_values($data))."'";
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
            $sql = $this->conn->real_escape_string($sql);

            $this->query($sql);
            return $this->conn->insert_id;
        }

        public function update($id, $data){

            $fields = [];

            foreach($data as $key => $value){
                $fields[] = "{$key} = '{$value}'";
            }

            $fields = implode(', ', $fields);
            
            $sql = "UPDATE {$this->table} SET {$fields} WHERE id = {$id}";

            $sql = $this->conn->real_escape_string($sql);

            $this->query($sql);

            return $this->find($id);
        }

        public function delete($id){
            $sql = "DELETE FROM {$this->table} WHERE id = {$id}";

            $sql = $this->conn->real_escape_string($sql);

            $this->query($sql);
        }

    }