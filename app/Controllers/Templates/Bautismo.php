<?php

namespace App\Controllers\Templates;
use App\Models\BautismoModel;

class Bautismo extends Sacramento{

    public function generarCertificado($data){
        (new BautismoModel)->create($data);

    }
   
    public function eliminarCertificado($id){
        (new BautismoModel)->delete($id);
    }

    
}