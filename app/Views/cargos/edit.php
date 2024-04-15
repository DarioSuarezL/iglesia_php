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
        <form action="/cargos/<?= $cargo['id'] ?>" method="POST">
            <h2 class="text-center">Editar cargo número: <?= $cargo['id'] ?></h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text" class="form-control" value="<?= $cargo['nombre']?>" />
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input name="descripcion" id="descripcion" type="text" class="form-control" value="<?= $cargo['descripcion']?>" />
            </div>
            <div class="form-group">
                <label for="ministerio_id">Estado civil:</label>
                <select name="ministerio_id" id="ministerio_id" class="form-control">
                    <?php foreach($ministerios as $ministerio): ?>
                    <option value=<?= $ministerio['id'] ?> <?php if($cargo['ministerio_id'] == $ministerio['id'] ) echo 'selected' ?>><?= $ministerio['nombre'] ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">
                Actualizar datos
            </button>
        </form>
    </div>
</body>
</html>