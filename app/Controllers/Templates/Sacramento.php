<?php

namespace App\Controllers\Templates;

abstract class Sacramento{

    public function sacramentar($data){
        $this->generarCertificado($data);
        $this->cambiarEstadoMiembro($data);
    }

    public function desacramentar($id){
        $this->cambiarEstadoMiembro($id);
        $this->eliminarCertificado($id);
    }


    public function generarCertificado($data){}

    public function eliminarCertificado($id){}

    public function cambiarEstadoMiembro($data){}

}