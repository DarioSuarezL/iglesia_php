<?php

    namespace App\Controllers;

    use App\Models\MemberModel;

    class MemberController extends Controller{

        // RUTAS GET

        public function index(){
            $members = new MemberModel;
            $members = $members->all();
            return $this->view('members.index', [
                'title' => 'Members',
                'members' => $members
            ]);
        }

        public function create(){
            return $this->view('members.create', [
                'title' => 'Registrar miembro'
            ]);
        }

        public function edit($id){
            return 'Formulario actualizar miembro '.$id;
        }

        public function show($id){
            return 'Miembro '.$id;
            // $member = new MemberModel;
            // $member = $member->find($id);
            // return $this->view('members.show', [
            //     'title' => 'Member',
            //     'member' => $member
            // ]);
        }

        // RUTAS POST

        public function store(){
            //Parametros
            $data = $_POST;
            $member = new MemberModel;
            $member->create($data);
            $this->redirect('/members');
        }

        public function update($id){
            return 'Actualizar miembro '.$id;
        }

        public function destroy($id){
            return 'Eliminar miembro '.$id;
        }

    }