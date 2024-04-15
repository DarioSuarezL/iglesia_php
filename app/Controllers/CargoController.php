<?php

namespace App\Controllers;

use App\Models\CargoModel;
use App\Models\MinisterioModel;

class CargoController extends Controller
{
    public function index()
    {
        $model = new CargoModel;
        $data = $model->all();

        return $this->view('cargos.index', [
            'title' => 'Administrar cargos',
            'cargos' => $data
        ]);
    }

    public function create()
    {
        $model = new MinisterioModel;
        $ministerios = $model->all();
        return $this->view('cargos.create', [
            'title' => 'Registrar cargo',
            'ministerios' => $ministerios
        ]);
    }

    public function edit($id)
    {
        $model = new CargoModel;
        $data = $model->find($id);
        $model = new MinisterioModel;
        $ministerios = $model->all();
        return $this->view('cargos.edit', [
            'title' => 'Editar cargo',
            'cargo' => $data,
            'ministerios' => $ministerios
        ]);
    }
    
    public function show($id)
    {
        $model = new CargoModel;
        $data = $model->find($id);
        
        $ministerio = new MinisterioModel;
        $ministerio = $ministerio->find($data['ministerio_id']);
        $data['ministerio_id'] = $ministerio['nombre'];
        
        return $this->view('cargos.show', [
            'title' => 'Cargo número '.$id,
            'cargo' => $data
        ]);
        
    }

    // POST
    
    public function store()
    {
        $data = $_POST;
        $model = new CargoModel;
        $model->create($data);
        return header('Location: /cargos');
    }

    public function update($id)
    {
        $data = $_POST;
        $model = new CargoModel;
        $model->update($id, $data);
        return header('Location: /cargos');
    }

    public function destroy($id)
    {
        $model = new CargoModel;
        $model->delete($id);
        return header('Location: /cargos');
    }
}
