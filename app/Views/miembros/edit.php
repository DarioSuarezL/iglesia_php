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
                <label for="estado_civil_id">Estado civil:</label>
                <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                    <option value=1 <?php if($miembro['estado_civil_id'] == 1) echo 'selected' ?>>Soltero</option>
                    <option value=2 <?php if($miembro['estado_civil_id'] == 2) echo 'selected' ?>>Casado</option>
                    <option value=3 <?php if($miembro['estado_civil_id'] == 3) echo 'selected' ?>>Divorciado</option>
                    <option value=4 <?php if($miembro['estado_civil_id'] == 4) echo 'selected' ?>>Viudo</option>
                </select>
                <!-- <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" /> -->
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