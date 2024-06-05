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

        foreach ($data as $key => $value) {
            $data[$key]['ministerio_nombre'] = (new MinisterioModel)->find($value['ministerio_id'])['nombre'];
        }

        return $this->view('cargos.index', [
            'title' => 'Administrar cargos',
            'cargos' => $data
        ]);
    }

    public function create()
    {
        $ministerios = (new MinisterioModel)->all();
        return $this->view('cargos.create', [
            'title' => 'Registrar cargo',
            'ministerios' => $ministerios
        ]);
    }

    public function edit($id)
    {
        $data = (new CargoModel)->find($id);
        $ministerios = (new MinisterioModel)->all();
        return $this->view('cargos.edit', [
            'title' => 'Editar cargo',
            'cargo' => $data,
            'ministerios' => $ministerios
        ]);
    }
    
    public function show($id)
    {
        $data = (new CargoModel)->find($id);
        $ministerio = (new MinisterioModel)->find($data['ministerio_id']);
        
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
        unset($model);
        return header('Location: /cargos');
    }

    public function update($id)
    {
        $data = $_POST;
        $model = new CargoModel;
        $model->update($id, $data);
        unset($model);
        return header('Location: /cargos');
    }

    public function destroy($id)
    {
        $model = new CargoModel;
        $model->delete($id);
        unset($model);
        return header('Location: /cargos');
    }
}
