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
        <form action="/matrimonios" method="POST">
            <h2 class="text-center">Registrar un nuevo matrimonio</h2>
            <div class="form-group">
                <label for="fecha_matrimonio">Fecha del matrimonio:</label>
                <input name="fecha_matrimonio" id="fecha_matrimonio" type="date" class="form-control" />
            </div>
            <div class="form-group">
                <label for="esposo_id">Esposo:</label>
                <select name="esposo_id" id="esposo_id" class="form-control">
                    <?php foreach($hombres as $hombre): ?>
                    <option value=<?= $hombre['id'] ?>><?= $hombre['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="esposa_id">Esposa:</label>
                <select name="esposa_id" id="esposa_id" class="form-control">
                    <?php foreach($mujeres as $mujer): ?>
                    <option value=<?= $mujer['id'] ?>><?= $mujer['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pastor_id">Pastor:</label>
                <select name="pastor_id" id="pastor_id" class="form-control">
                    <?php foreach($miembros as $miembro): ?>
                    <option value=<?= $miembro['id'] ?>><?= $miembro['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>



            <button class="btn btn-primary" type="submit">
                Registrar
            </button>
        </form>
    </div>
    
</body>
</html>