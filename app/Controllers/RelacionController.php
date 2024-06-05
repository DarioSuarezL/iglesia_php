<?php

namespace App\Controllers;

use App\Models\MiembroModel;
use App\Models\RelacionModel;
use App\Models\TipoRelacionModel;

class RelacionController extends Controller
{
    public function create($id)
    {

        $miembroPrincipal = (new MiembroModel)->find($id);
        $miembros = (new MiembroModel)->all();

        $relacionados = (new MiembroModel)->parientes($id);

        unset($miembros[array_search($miembroPrincipal, $miembros)]);

        $tiposRelacion = (new TipoRelacionModel)->all();

        return $this->view('relaciones.create', [
            'title' => 'Agregar relación',
            'miembroPrincipal' => $miembroPrincipal,
            'tiposRelacion' => $tiposRelacion,
            'miembros' => $miembros,
            'relacionados' => $relacionados
        ]);
    }
    
    public function store($id)
    {
        (new RelacionModel)->create([
            'miembro_id' => $id,
            'tipo_relacion_id' => $_POST['tipo_relacion_id'],
            'miembro_relacionado_id' => $_POST['miembro_relacionado_id']
        ]);
        return $this->redirect('/miembros');
    }

    public function destroy($id, $id_relacionado)
    {
        $relaciones = (new RelacionModel)->query('SELECT * FROM relaciones WHERE miembro_id = ? AND miembro_relacionado_id = ?', [$id, $id_relacionado], 'ii')->get();
        foreach ($relaciones as $relacion) {
            (new RelacionModel)->delete($relacion['id']);
        }
        
        $relaciones2 = (new RelacionModel)->query('SELECT * FROM relaciones WHERE miembro_id = ? AND miembro_relacionado_id = ?', [$id_relacionado, $id], 'ii')->get();
        foreach ($relaciones2 as $relacion2) {
            (new RelacionModel)->delete($relacion2['id']);
        }


        return $this->redirect('/relaciones/'.$id.'/create');
    }

}