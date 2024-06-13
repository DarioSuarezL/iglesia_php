<?php

namespace App\Controllers;

use App\Controllers\Proxy\CargoManager;
use App\Models\CargoModel;
use App\Models\MinisterioModel;
use App\Controllers\Proxy\CargoService;
use App\Controllers\Proxy\CargoServiceProxy;
use App\Controllers\Proxy\CargoServiceInterface;

class CargoController extends Controller
{

    private CargoManager $cargoManager;


    public function __construct()
    {
        $service = new CargoService();
        $proxy = new CargoServiceProxy($service);
        $this->cargoManager = new CargoManager($proxy);
    }

    public function index()
    {
        $data = $this->cargoManager->all();

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
        $data = $this->cargoManager->get($id);
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
        $this->cargoManager->store($data);
        return header('Location: /cargos');
    }

    public function update($id)
    {
        $data = $_POST;
        $this->cargoManager->update($id, $data);
        return header('Location: /cargos');
    }

    public function destroy($id)
    {
        $this->cargoManager->destroy($id);
        return header('Location: /cargos');
    }
}
