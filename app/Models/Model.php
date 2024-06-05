<?php

namespace App\Models;

use mysqli;

class Model
{
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

    public function __destruct()
    {
        $this->disconnection();
    }


    public function connection()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        // echo "Connected successfully <br> PORT:3306";
    }

    public function disconnection(){
        if($this->conn) $this->conn->close();
    }

    public function query($sql, $data = [], $params = null)
    {

        if ($params == null) {
            $params = str_repeat('s', count($data));
        }

        if ($data) {
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param($params, ...$data);
            $stmt->execute();
            $this->query = $stmt->get_result();
        } else {
            $this->query = $this->conn->query($sql);
        }

        return $this;
    }

    public function get()
    {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    public function first()
    {
        return $this->query->fetch_assoc();
    }

    // consultas prearmadas

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id], 'i')->first();
    }

    public function where($column, $operator, $value = null)
    {
        // return $memberModel->where('numero_celular','>' ,65085392)->get();
        if ($value === null) {
            $value =  $operator;
            $operator = '=';
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} ?";

        $this->query($sql, [$value]);

        return $this;
    }


    public function create($data)
    {
        $columns = implode(',', array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (" . str_repeat('?, ', count($data) - 1) . "?)";

        $values = array_values($data);

        $this->query($sql, $values);
        return $this->find($this->conn->insert_id);
    }

    public function update($id, $data)
    {

        $fields = [];

        foreach ($data as $key => $value) {
            $fields[] = "{$key} = ?";
        }

        $fields = implode(', ', $fields);

        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = ?";

        $values = array_values($data);
        $values[] = $id;

        $params = str_repeat('s', count($data)) . 'i';

        $this->query($sql, $values, $params);

        return $this->find($id);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->query($sql, [$id], 'i');
    }
}
