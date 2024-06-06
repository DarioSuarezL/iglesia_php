<?php

namespace App\Controllers;

use App\Models\MinisterioModel;
use App\Controllers\Commands\StoreCommand;
use App\Controllers\Commands\UpdateCommand;
use App\Controllers\Commands\DestroyCommand;
use App\Controllers\Commands\MinisterioInvoker;

class MinisterioController extends Controller
{

    public MinisterioInvoker $invoker;

    public function __construct()
    {
        $this->invoker = new MinisterioInvoker;
    }

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

        $cmd = new StoreCommand($data);
        
        $this->invoker->setCommand($cmd);
        $this->invoker->executeCommand();


        // $model = new MinisterioModel;
        // $model->create($data);
        // unset($model);
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
        
        $cmd = new UpdateCommand($data, $id);
        $this->invoker->setCommand($cmd);
        $this->invoker->executeCommand();
        
        // (new MinisterioModel)->update($id, $data);

        $this->redirect('/ministerios');
    }

    public function destroy($id)
    {
        $data = (new MinisterioModel)->find($id);
        $cmd = new DestroyCommand($data);
        $this->invoker->setCommand($cmd);
        $this->invoker->executeCommand();
        $this->redirect('/ministerios');
    }

    public function undo()
    {
        $this->invoker->undoCommand();
        // $this->redirect('/ministerios');
    }

}
