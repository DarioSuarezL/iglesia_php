<?php

namespace App\Controllers\Proxy;

use App\Models\CargoModel;

class CargoService implements CargoServiceInterface
{
    private $cargo;

    public function __construct()
    {
        $this->cargo = new CargoModel;
    }

    public function create($data)
    {
        $this->cargo->create($data);
    }

    public function delete($id)
    {
        $this->cargo->delete($id);
    }

    public function update($id, $data)
    {
        (new CargoModel)->update($id, $data);
    }

    public function find($id)
    {
        // throw new \Exception('Method not implemented');
        return $this->cargo->find($id);;
    }

    public function findAll()
    {
        // throw new \Exception('Method not implemented');
        return $this->cargo->all();
    }
}