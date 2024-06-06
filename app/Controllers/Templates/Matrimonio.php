<?php

namespace App\Controllers\Templates;
use App\Models\MatrimonioModel;

class Matrimonio extends Sacramento{

    public function generarCertificado($data){
        (new MatrimonioModel)->create($data);
    }

    public function eliminarCertificado($id){
        (new MatrimonioModel)->delete($id);
    }
   

    
}