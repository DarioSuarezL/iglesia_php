<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

    <div class="px-5 py-3">
        <form action="/relaciones/<?= $miembroPrincipal['id'] ?>" method="POST">
            <h2 class="text-center">Registrar un nuevo pariente del miembro: <?= $miembroPrincipal['nombre'] ?></h2>
            <div class="form-group">
                <label for="miembro_id">Miembro:</label>
                <select name="miembro_id" id="miembro_id" class="form-control" disabled>
                    <option value=<?= $miembroPrincipal['id'] ?>><?= $miembroPrincipal['nombre'].' '.$miembroPrincipal['apellido_paterno'].' '.$miembroPrincipal['apellido_materno']  ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="miembro_relacionado_id">Miembro relacionado:</label>
                <select name="miembro_relacionado_id" id="miembro_relacionado_id" class="form-control">
                    <?php foreach($miembros as $miembro): ?>
                        <option value=<?= $miembro['id'] ?>><?= $miembro['nombre'].' '.$miembro['apellido_paterno'].' '.$miembro['apellido_materno'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_relacion_id">Es mi:</label>
                <select name="tipo_relacion_id" id="tipo_relacion_id" class="form-control">
                    <?php foreach($tiposRelacion as $tipoRelacion): ?>
                        <option value=<?= $tipoRelacion['id'] ?>><?= $tipoRelacion['descripcion'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">
                Registrar
            </button>
        </form>

        <div class="col py-5">
            <h2>Parientes: </h2>
            <?php foreach($relacionados as $relacionado): ?>
            <div class="d-flex">
                <p><?= $relacionado['nombre'].' '.$relacionado['apellido_paterno'],' ',$relacionado['apellido_materno'] ?></p>
                <form action="/relaciones/<?= $miembroPrincipal['id'].'/'.$relacionado['id'] ?>/delete" method="POST">
                    <button class="btn btn-primary btn-danger mx-1">
                        Eliminar
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    
</body>
</html>