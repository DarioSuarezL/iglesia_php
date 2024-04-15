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
        <form action="/bautismos" method="POST">
            <h2 class="text-center">Registrar un nuevo bautismo</h2>
            <div class="form-group">
                <label for="fecha_bautizo">Fecha bautismo:</label>
                <input name="fecha_bautizo" id="fecha_bautizo" type="date" class="form-control" />
            </div>

            <div class="form-group">
                <label for="miembro_id">Miembro:</label>
                <select name="miembro_id" id="miembro_id" class="form-control">
                    <?php foreach($miembros as $miembro): ?>
                        <option value="<?= $miembro['id'] ?>"><?= $miembro['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pastor_id">Bautizado por:</label>
                <select name="pastor_id" id="pastor_id" class="form-control">
                    <?php foreach($miembros as $miembro): ?>
                        <option value="<?= $miembro['id'] ?>"><?= $miembro['nombre'] ?></option>
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