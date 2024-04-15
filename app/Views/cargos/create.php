<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="px-5 py-3">
        <form action="/cargos" method="POST">
            <h2 class="text-center">Registrar un nuevo cargo</h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input name="descripcion" id="descripcion" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="ministerio">Ministerio:</label>
                <select name="ministerio_id" id="ministerio_id" class="form-control">
                    <?php foreach($ministerios as $ministerio): ?>
                        <option value="<?= $ministerio['id'] ?>"><?= $ministerio['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">
                Registrar
            </button>
        </form>
    </div>
    
</body>
</html>