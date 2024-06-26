<?php

namespace App\Controllers\Proxy;

class CargoServiceProxy implements CargoServiceInterface
{
    private CargoService $cargoService;
    private $listCache;
    private $cargoCache;
    private bool $needRefreshList;
    private bool $needRefreshCargo;

    public function __construct(CargoService $service)
    {
        $this->cargoService = $service;
        

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->listCache = $_SESSION['listCache'] ?? [];
        $this->cargoCache = $_SESSION['cargoCache'] ?? null;
        $this->needRefreshList = $_SESSION['needRefreshList'] ?? false;
        $this->needRefreshCargo = $_SESSION['needRefreshCargo'] ?? false;
    }

    public function create($data)
    {
        $this->cargoService->create($data);
        $this->needRefreshList = true;
        $this->needRefreshCargo = true;
        $_SESSION['needRefreshList'] = $this->needRefreshList;
        $_SESSION['needRefreshCargo'] = $this->needRefreshCargo;
    }
        
    public function delete($id)
    {
        $this->cargoService->delete($id);
        $this->needRefreshList = true;
        $_SESSION['needRefreshList'] = $this->needRefreshList;
    }

    public function update($id, $data)
    {
        $this->cargoService->update($id, $data);
        $this->needRefreshList = true;
        $this->needRefreshCargo = true;
        $_SESSION['needRefreshCargo'] = $this->needRefreshCargo;
        $_SESSION['needRefreshList'] = $this->needRefreshList;
    }

    public function find($id)
    {
        if ($this->cargoCache == null || $this->needRefreshCargo || $this->cargoCache['id'] != $id) {
            $this->cargoCache = $this->cargoService->find($id);
            $_SESSION['cargoCache'] = $this->cargoCache;
        }

        $this->needRefreshCargo = false;
        $_SESSION['needRefreshCargo'] = $this->needRefreshCargo;

        return $this->cargoCache;
    }

    public function findAll()
    {
        if ($this->listCache == [] || $this->needRefreshList) {
            $this->listCache = $this->cargoService->findAll();
            $_SESSION['listCache'] = $this->listCache;
        }

        $this->needRefreshList = false;
        $_SESSION['needRefreshList'] = $this->needRefreshList;

        return $this->listCache;
    }
}