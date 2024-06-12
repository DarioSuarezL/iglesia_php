<?php

namespace App\Controllers\Proxy;

use App\Models\CargoModel;

class CargoService implements CargoServiceInterface
{
    public function create($data)
    {
        (new CargoModel)->create($data);
    }

    public function delete($id)
    {
        (new CargoModel)->delete($id);
    }

    public function update($id, $data)
    {
        (new CargoModel)->update($id, $data);
    }

    public function find($id)
    {
        // throw new \Exception('Method not implemented');
        return (new CargoModel)->find($id);
    }

    public function findAll()
    {
        // throw new \Exception('Method not implemented');
        return (new CargoModel)->all();
    }
}