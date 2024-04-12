<?php


namespace App\Controllers;

    use App\Models\MiembroModel;
    use App\Models\EstadoCivilModel;

    class MiembroController extends Controller{

        // RUTAS GET

        public function index(){
            $data = new MiembroModel;
            $data = $data->all();
            return $this->view('miembros.index', [
                'title' => 'Miembros',
                'miembros' => $data
            ]);
        }

        public function create(){
            return $this->view('miembros.create', [
                'title' => 'Registrar miembro'
            ]);
        }

        public function edit($id){
            $data = new MiembroModel;
            $data = $data->find($id);
            return $this->view('miembros.edit', [
                'title' => 'Editar miembro '.$id,
                'miembro' => $data
            ]);
        }

        public function show($id){
            $data = new MiembroModel;
            $data = $data->find($id);
            $estado_civil = new EstadoCivilModel;
            $data['estado_civil_id'] = $estado_civil->find($data['estado_civil_id'])['descripcion'];
            return $this->view('miembros.show', [
                'title' => 'Miembro número '.$id,
                'miembro' => $data
            ]);
        }

        // RUTAS POST

        public function store(){
            //Parametros
            $data = $_POST;
            $model = new MiembroModel;
            $model->create($data);
            $this->redirect('/miembros');
        }

        public function update($id){
            //Parametros
            $data = $_POST;
            $model = new MiembroModel;
            $model->update($id, $data);
            $this->redirect('/miembros/'.$id);
        }

        public function destroy($id){
            $model = new MiembroModel;
            $model->delete($id);
            $this->redirect('/miembros');
        }

    }