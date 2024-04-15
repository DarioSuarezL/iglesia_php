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
        <form action="/bautismos/<?= $bautismo['id'] ?>" method="POST">
            <h2 class="text-center">Editar bautismo número: <?= $bautismo['id'] ?></h2>
            <div class="form-group">
                <label for="miembro_id">Bautizado:</label>
                <select name="miembro_id" id="miembro_id" class="form-control">
                    <?php foreach($miembros as $miembro): ?>
                    <option value=<?= $miembro['id'] ?> <?php if($bautismo['miembro_id'] == $miembro['id'] ) echo 'selected' ?>><?= $miembro['nombre'].' '.$miembro['apellido_paterno'].' '.$miembro['apellido_materno'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="pastor_id">Por:</label>
                <select name="pastor_id" id="pastor_id" class="form-control">
                    <?php foreach($miembros as $miembro): ?>
                    <option value=<?= $miembro['id'] ?> <?php if($bautismo['pastor_id'] == $miembro['id'] ) echo 'selected' ?>><?= 'Pastor: '.$miembro['nombre'].' '.$miembro['apellido_paterno'].' '.$miembro['apellido_materno'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_bautizo">Fecha de nacimiento:</label>
                <input name="fecha_bautizo" id="fecha_bautizo" type="date" class="form-control" value="<?= $bautismo['fecha_bautizo'] ?>" />
            </div>
            <button class="btn btn-primary" type="submit">
                Actualizar datos
            </button>
        </form>
    </div>
</body>
</html>