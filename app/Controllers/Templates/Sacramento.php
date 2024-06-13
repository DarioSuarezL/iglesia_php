<?php

namespace App\Controllers\Templates;

abstract class Sacramento{

    public function realizar($data){
        $this->generarCertificado($data);
        $this->cambiarEstadoMiembro($data);
    }

    public function deshacer($id){
        $this->cambiarEstadoMiembro($id);
        $this->eliminarCertificado($id);
    }


    public function generarCertificado($data){}

    public function eliminarCertificado($id){}

    public function cambiarEstadoMiembro($data){}

}