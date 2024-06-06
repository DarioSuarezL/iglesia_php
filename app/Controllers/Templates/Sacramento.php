<?php

namespace App\Controllers\Templates;

abstract class Sacramento{

    public function sacramentar($data){
        $this->generarCertificado($data);
    }

    public function desacramentar($id){
        $this->eliminarCertificado($id);
    }


    public function generarCertificado($data){}

    public function eliminarCertificado($id){}

}