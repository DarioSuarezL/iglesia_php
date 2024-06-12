<?php

namespace App\Controllers\Templates;
use App\Models\MiembroModel;
use App\Models\BautismoModel;

class Bautismo extends Sacramento{

    public function generarCertificado($data){
        (new BautismoModel)->create($data);
    }
   
    public function eliminarCertificado($id){
        (new BautismoModel)->delete($id);
    }

    public function cambiarEstadoMiembro($data){

        if(is_array($data)){
            $id = $data['miembro_id'];
        }else{
            $idCertificado = $data;
            $certificado = (new BautismoModel)->find($idCertificado);
            $id = $certificado['miembro_id'];

        }

        $dataOld = (new MiembroModel)->find($id);

        (new MiembroModel)->update($id, [
            'bautizado' => $dataOld['bautizado'] == 1 ? 0 : 1
        ]);

    }

    
}