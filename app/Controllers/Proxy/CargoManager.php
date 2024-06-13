<?php

namespace App\Controllers\Proxy;

class CargoManager
{
    private CargoServiceInterface $service;

    public function __construct(CargoServiceInterface $service)
    {
        $this->service = $service;
    }

    public function store($data)
    {
        $this->service->create($data);
    }

    public function update($id, $data)
    {
        $this->service->update($id, $data);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
    }

    public function get($id)
    {
        return $this->service->find($id);
    }

    public function all()
    {
        return $this->service->findAll();
    }

}