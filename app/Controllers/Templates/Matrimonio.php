<?php

namespace App\Controllers\Templates;
use App\Models\MiembroModel;
use App\Models\MatrimonioModel;

class Matrimonio extends Sacramento{

    public function generarCertificado($data){
        (new MatrimonioModel)->create($data);
    }

    public function eliminarCertificado($id){
        (new MatrimonioModel)->delete($id);
    }
   
    public function cambiarEstadoMiembro($data){
        if(is_array($data)){
            $id1 = $data['esposo_id'];
            $id2 = $data['esposa_id'];
        }else{
            $idCertificado = $data;

            $certificado = (new MatrimonioModel)->find($idCertificado);

            $id1 = $certificado['esposo_id'];
            $id2 = $certificado['esposa_id'];
        }

        $dataOld1 = (new MiembroModel)->find($id1);
        $dataOld2 = (new MiembroModel)->find($id2);

        (new MiembroModel)->update($id1, [
            'casado' => $dataOld1['casado'] == 1 ? 0 : 1
        ]);

        (new MiembroModel)->update($id2, [
            'casado' => $dataOld2['casado'] == 1 ? 0 : 1
        ]);




    }
    
}