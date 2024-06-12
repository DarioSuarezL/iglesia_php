<?php

namespace App\Controllers\Proxy;

interface CargoServiceInterface
{
    public function create($data);
    public function delete($id);
    public function update($id, $data);
    public function find($id);
    public function findAll();
}