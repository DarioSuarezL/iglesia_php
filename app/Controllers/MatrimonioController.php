<?php

namespace App\Controllers;

use App\Controllers\Templates\Matrimonio;
use App\Models\MiembroModel;
use App\Models\MatrimonioModel;

class MatrimonioController extends Controller
{
    public function index()
    {
        $matrimonios = (new MatrimonioModel)->all();

        foreach ($matrimonios as $key => $value) {
            $matrimonios[$key]['esposo'] = (new MiembroModel)->find($value['esposo_id'])['nombre'];
            $matrimonios[$key]['esposa'] = (new MiembroModel)->find($value['esposa_id'])['nombre'];
        }

        return $this->view('matrimonios.index', [
            'title' => 'Certificados de Matrimonio',
            'matrimonios' => $matrimonios
        ]);
    }

    public function create()
    {
        $hombres = (new MiembroModel)->where('sexo', 'HOMBRE')->get();
        $mujeres = (new MiembroModel)->where('sexo', 'MUJER')->get();
        // $miembros = array_merge($hombres, $mujeres);
        $miembros = (new MiembroModel)->all();
        return $this->view('matrimonios.create', [
            'title' => 'Registrar un nuevo matrimonio',
            'miembros' => $miembros,
            'hombres' => $hombres,
            'mujeres' => $mujeres
        ]);
        
    }
    
    public function store()
    {
        $data = $_POST;
        (new Matrimonio)->realizar($data);
        header('Location: /matrimonios');
    }
    
    public function edit($id)
    {
        $hombres = (new MiembroModel)->where('sexo', 'HOMBRE')->get();
        $mujeres = (new MiembroModel)->where('sexo', 'MUJER')->get();
        $matrimonio = (new MatrimonioModel)->find($id);
        $miembros = (new MiembroModel)->all();

        return $this->view('matrimonios.edit', [
            'title' => 'Editar matrimonio',
            'matrimonio' => $matrimonio,
            'hombres' => $hombres,
            'mujeres' => $mujeres,
            'miembros' => $miembros
        ]);

    }

    public function show($id)
    {
        $matrimonio = (new MatrimonioModel)->find($id);
        $matrimonio['esposo'] = (new MiembroModel)->find($matrimonio['esposo_id']);
        $matrimonio['esposa'] = (new MiembroModel)->find($matrimonio['esposa_id']);
        $matrimonio['pastor'] = (new MiembroModel)->find($matrimonio['pastor_id']);
        return $this->view('matrimonios.show', [
            'title' => 'Certificado de Matrimonio',
            'matrimonio' => $matrimonio
        ]);
    }

    public function update($id)
    {
        (new MatrimonioModel)->update($id, $_POST);
        header('Location: /matrimonios');
    }

    public function destroy($id)
    {
        (new Matrimonio)->deshacer($id);
        header('Location: /matrimonios');
    }



}