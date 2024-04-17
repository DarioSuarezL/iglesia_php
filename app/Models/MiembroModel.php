<?php

namespace App\Models;

class MiembroModel extends Model
{
    protected $table = 'miembros';

    public function padres($id)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE miembro_id = ? AND (tipo_relacion_id = 1 OR tipo_relacion_id = 2)', [$id], 'i')->get();
        $padres = [];
        foreach ($relaciones as $key => $relacion) {
            $padres[$key] = (new MiembroModel)->find($relacion['miembro_relacionado_id']);
        }
        return $padres;
    }

    public function tios($id)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE miembro_id = ? AND tipo_relacion_id = 4', [$id], 'i')->get();
        $tios = [];
        foreach ($relaciones as $key => $relacion) {
            $tios[$key] = (new MiembroModel)->find($relacion['miembro_relacionado_id']);
        }
        return $tios;
    }

    public function primos($id)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE (miembro_id = ? OR miembro_relacionado_id = ?) AND tipo_relacion_id = 6', [$id, $id], 'ii')->get();
        $primos = [];
        foreach ($relaciones as $key => $relacion) {
            if ($relacion['miembro_id'] == $id) {
                $primos[$key] = (new MiembroModel)->find($relacion['miembro_relacionado_id']);
            } else {
                $primos[$key] = (new MiembroModel)->find($relacion['miembro_id']);
            }
            echo json_encode($primos);
        }
    }

    public function hermanos($id)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE (miembro_id = ? OR miembro_relacionado_id = ?) AND tipo_relacion_id = 3', [$id, $id], 'ii')->get();
        $hermanos = [];
        foreach ($relaciones as $key => $relacion) {
            if ($relacion['miembro_id'] == $id) {
                $hermanos[$key] = (new MiembroModel)->find($relacion['miembro_relacionado_id']);
            } else {
                $hermanos[$key] = (new MiembroModel)->find($relacion['miembro_id']);
            }
        }
        return $hermanos;
    }

    public function abuelos($id)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE miembro_id = ? AND tipo_relacion_id = 5', [$id], 'i')->get();
        $abuelos = [];
        foreach ($relaciones as $key => $relacion) {
            $abuelos[$key] = (new MiembroModel)->find($relacion['miembro_relacionado_id']);
        }
        return $abuelos;
    }

    public function parientes($id)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE miembro_id = ? OR miembro_relacionado_id = ?', [$id, $id], 'ii')->get();
        $parientes = [];
        foreach ($relaciones as $key => $relacion) {
            if ($relacion['miembro_id'] == $id) {
                $parientes[$key] = (new MiembroModel)->find($relacion['miembro_relacionado_id']);
            } else {
                $parientes[$key] = (new MiembroModel)->find($relacion['miembro_id']);
            }
        }
        $parientes = array_map("unserialize", array_unique(array_map("serialize", $parientes)));
        return $parientes;
    }

}
