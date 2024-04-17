<?php


namespace App\Controllers;

use App\Models\CargoModel;
use App\Models\MiembroModel;
use App\Models\EstadoCivilModel;

class MiembroController extends Controller
{

    // RUTAS GET

    public function index()
    {
        $model = new MiembroModel;
        $data = $model->all();

        return $this->view('miembros.index', [
            'title' => 'Miembros',
            'miembros' => $data
        ]);
    }

    public function create()
    {
        // $cargo = new CargoModel;
        $estados_civil = (new EstadoCivilModel)->all();
        $cargos = (new CargoModel)->all();
        return $this->view('miembros.create', [
            'title' => 'Registrar miembro',
            'cargos' => $cargos,
            'estados_civil' => $estados_civil
        ]);
    }
    
    public function edit($id)
    {
        $estados_civil = (new EstadoCivilModel)->all();
        $cargos = (new CargoModel)->all();
        $data = new MiembroModel;
        $data = $data->find($id);
        return $this->view('miembros.edit', [
            'title' => 'Editar miembro ' . $id,
            'miembro' => $data,
            'cargos' => $cargos,
            'estados_civil' => $estados_civil
        ]);
    }

    public function show($id)
    {
        
        $padres = (new MiembroModel)->padres($id);
        $tios = (new MiembroModel)->tios($id);
        $hermanos = (new MiembroModel)->hermanos($id);
        $primos = (new MiembroModel)->primos($id);
        $abuelos = (new MiembroModel)->abuelos($id);


        $data = (new MiembroModel)->find($id);
        $data['estado_civil_id'] = (new EstadoCivilModel)->find($data['estado_civil_id'])['descripcion'];

        if ($data['cargo_id'])
            $data['cargo_id'] = (new CargoModel)->find($data['cargo_id'])['nombre'];

        return $this->view('miembros.show', [
            'title' => 'Miembro número ' . $id,
            'miembro' => $data,
            'padres' => $padres,
            'tios' => $tios,
            'hermanos' => $hermanos,
            'primos' => $primos,
            'abuelos' => $abuelos
        ]);
    }

    // RUTAS POST

    public function store()
    {
        //Parametros
        $data = $_POST;
        $model = new MiembroModel;
        if($data['cargo_id'] == '') unset($data['cargo_id']);
        $model->create($data);
        $this->redirect('/miembros');
    }
    
    public function update($id)
    {
        //Parametros
        $data = $_POST;
        if($data['cargo_id'] == '') unset($data['cargo_id']);
        $model = new MiembroModel;
        $model->update($id, $data);
        $this->redirect('/miembros/' . $id);
    }

    public function destroy($id)
    {
        $model = new MiembroModel;
        $model->delete($id);
        $this->redirect('/miembros');
    }
}
