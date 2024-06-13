<?php

namespace App\Controllers\Proxy;

use App\Models\CargoModel;

class CargoService implements CargoServiceInterface
{
    private $cargoModel;

    public function __construct()
    {
        $this->cargoModel = new CargoModel;
    }

    public function create($data)
    {
        $this->cargoModel->create($data);
    }

    public function delete($id)
    {
        $this->cargoModel->delete($id);
    }

    public function update($id, $data)
    {
        (new CargoModel)->update($id, $data);
    }

    public function find($id)
    {
        // throw new \Exception('Method not implemented');
        return $this->cargoModel->find($id);;
    }

    public function findAll()
    {
        // throw new \Exception('Method not implemented');
        return $this->cargoModel->all();
    }
}