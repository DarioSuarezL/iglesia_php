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
        <form action="/miembros/<?= $miembro['id'] ?>" method="POST">
            <h2 class="text-center">Editar miembro número: <?= $miembro['id'] ?></h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text" class="form-control" value="<?= $miembro['nombre']?>" />
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido paterno:</label>
                <input name="apellido_paterno" id="apellido_paterno" type="text" class="form-control" value="<?= $miembro['apellido_paterno']?>" />
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido materno:</label>
                <input name="apellido_materno" id="apellido_materno" type="text" class="form-control" value="<?= $miembro['apellido_materno']?>" />
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control"  value="<?= $miembro['fecha_nacimiento']?>" />
            </div>
            <div class="form-group">
                <label for="cargo_id">Estado civil:</label>
                <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                    <?php foreach($estados_civil as $estado_civil): ?>
                    <option value=<?= $estado_civil['id'] ?> <?php if($miembro['estado_civil_id'] == $estado_civil['id']) echo 'selected' ?>><?= $estado_civil['descripcion'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cargo_id">Estado civil:</label>
                <select name="cargo_id" id="cargo_id" class="form-control">
                    <option value="">-- NINGUNO --</option>
                    <?php foreach($cargos as $cargo): ?>
                    <option value=<?= $cargo['id'] ?> <?php if($miembro['cargo_id'] == $cargo['id']) echo 'selected' ?>><?= $cargo['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="HOMBRE" <?php if($miembro['sexo'] == 'HOMBRE') echo 'selected' ?>>Hombre</option>
                    <option value="MUJER" <?php if($miembro['sexo'] == 'MUJER') echo 'selected' ?>>Mujer</option>
                </select>
                <!-- <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" /> -->
            </div>
            <div class="form-group">
                <label for="numero_celular">Número de celular:</label>
                <input name="numero_celular" id="numero_celular" type="text" class="form-control" value="<?= $miembro['numero_celular'] ?>" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" id="email" type="email" class="form-control" value="<?= $miembro['email'] ?>">
            </div>
            <button class="btn btn-primary" type="submit">
                Actualizar datos
            </button>
        </form>
    </div>
</body>
</html>