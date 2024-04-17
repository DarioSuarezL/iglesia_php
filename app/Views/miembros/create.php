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
        <form action="/miembros" method="POST">
            <h2 class="text-center">Registrar un nuevo miembro</h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido paterno:</label>
                <input name="apellido_paterno" id="apellido_paterno" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido materno:</label>
                <input name="apellido_materno" id="apellido_materno" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" />
            </div>
            <div class="form-group">
                <label for="estado_civil_id">Estado civil:</label>
                <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                    <?php foreach($estados_civil as $estado_civil): ?>
                    <option value=<?= $estado_civil['id'] ?>><?= $estado_civil['descripcion'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <select name="cargo_id" id="cargo_id" class="form-control">
                    <option value="">-- NINGUNO --</option>
                    <?php foreach($cargos as $cargo): ?>
                    <option value=<?= $cargo['id'] ?>><?= $cargo['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="HOMBRE">Hombre</option>
                    <option value="MUJER">Mujer</option>
                </select>
                <!-- <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" /> -->
            </div>
            <div class="form-group">
                <label for="numero_celular">Número de celular:</label>
                <input name="numero_celular" id="numero_celular" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" id="email" type="email" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">
                Registrar
            </button>
        </form>
    </div>
    
</body>
</html>