<?php

    namespace App\Controllers;

    use App\Models\MemberModel;

    class HomeController extends Controller{
        public function index(){

            $memberModel = new MemberModel();

            return $memberModel->create([
                'nombre' => 'Juan',
                'apellido_paterno' => 'Perez',
                'apellido_materno' => 'Gomez',
                'fecha_nacimiento' => '1990-01-01',
                'estado_civil' => 'Soltero',
                'numero_celular' => 65085391,
                'email' => 'correo@correo.com',
            ]);

            // return $this->view('home', [
            //     'title' => 'Home'
            // ]);
        }
    }