<?php

namespace App\Controllers;

use App\Models\MinisterioModel;

class MinisterioController extends Controller
{
    public function index()
    {
        $model = (new MinisterioModel)->all();

        return $this->view('ministerios.index', [
            'title' => 'Ministerios',
            'ministerios' => $model
        ]);
    }

    public function create()
    {
        return $this->view('ministerios.create', [
            'title' => 'Registrar ministerio'
        ]);
    }

    public function store()
    {
        $data = $_POST;
        $model = new MinisterioModel;
        $model->create($data);
        unset($model);
        // return json_encode($model);
        $this->redirect('/ministerios');
    }

    public function show($id)
    {
        $model = (new MinisterioModel)->find($id);
        return $this->view('ministerios.show', [
            'title' => 'Ministerio número ' . $id,
            'ministerio' => $model
        ]);
    }

    public function edit($id)
    {
        $model = (new MinisterioModel)->find($id);
        return $this->view('ministerios.edit', [
            'title' => 'Editar ministerio número ' . $id,
            'ministerio' => $model
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        (new MinisterioModel)->update($id, $data);
        $this->redirect('/ministerios');
    }

    public function destroy($id)
    {
        $model = new MinisterioModel;
        $model->delete($id);
        unset($model);
        $this->redirect('/ministerios');
    }
}
