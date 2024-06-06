<?php

namespace App\Controllers;

use App\Controllers\Templates\Bautismo;
use App\Controllers\Templates\Sacramento;
use App\Models\MiembroModel;
use App\Models\BautismoModel;

class BautismoController extends Controller
{
    public function index()
    {
        $data = (new BautismoModel)->all();

        foreach ($data as $key => $value) {
            $data[$key]['miembro'] = (new MiembroModel)->find($value['miembro_id'])['nombre'];
        }

        return $this->view('bautismos.index',[
            'title' => 'Bautismos',
            'bautismos' => $data
        ]);
    }

    public function create()
    {
        $miembros = (new MiembroModel)->all();
        return $this->view('bautismos.create',[
            'title' => 'Registrar bautismo',
            'miembros' => $miembros
        ]);
    }

    public function show($id)
    {
        $bautismo = (new BautismoModel)->find($id);
        $miembro = (new MiembroModel)->find($bautismo['miembro_id']);
        $pastor = (new MiembroModel)->find($bautismo['pastor_id']);
        return $this->view('bautismos.show',[
            'title' => 'Detalle del bautismo',
            'bautismo' => $bautismo,
            'miembro' => $miembro,
            'pastor' => $pastor
        ]);
    }
    
    public function edit($id)
    {
        $bautismo = (new BautismoModel)->find($id);
        // $bautizado = (new MiembroModel)->find($bautismo['miembro_id']);
        $pastor = (new MiembroModel)->find($bautismo['pastor_id']);
        $miembros = (new MiembroModel)->all(); 
        return $this->view('bautismos.edit',[
            'title' => 'Editar bautismo',
            'bautismo' => $bautismo,
            // 'bautizado' => $bautizado,
            'pastor' => $pastor,
            'miembros' => $miembros
        ]);
    }

    public function store()
    {
        $data = $_POST;

        // (new BautismoModel)->create($data);
        (new Bautismo)->generarCertificado($data);

        return header('Location: /bautismos');
    }

    public function update($id){
        $data = $_POST;

        (new BautismoModel)->update($id, $data);

        return header('Location: /bautismos');

    }

    public function destroy($id){
        (new Bautismo)->eliminarCertificado($id);
        return header('Location: /bautismos');
    }

}
