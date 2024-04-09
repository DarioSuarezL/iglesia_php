<?php

    namespace App\Controllers;

    use App\Models\MemberModel;

    class HomeController extends Controller{
        public function index(){

            $memberModel = new MemberModel();

            return $memberModel->find(1);

            // return $this->view('home', [
            //     'title' => 'Home'
            // ]);
        }
    }