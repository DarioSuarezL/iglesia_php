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
            <h2 class="text-center">Datos del miembro número: <?= $miembro['id'] ?></h2>
            <div class="container">
                <p><span class="font-weight-bold">Nombre completo: </span><?= $miembro['nombre'] .' '. $miembro['apellido_paterno'] .' '. $miembro['apellido_materno'] ?></p>
            </div>
            <div class="container">
                <p><span class="font-weight-bold">Fecha de nacimiento: </span><?= $miembro['fecha_nacimiento'] ?></p>
            </div>
            <div class="container">
                <p><span class="font-weight-bold">Estado civil: </span><?= $miembro['estado_civil_id'] ?></p>
            </div>
            <div class="container">
                <p><span class="font-weight-bold">Sexo: </span><?= $miembro['sexo'] ?></p>
            </div>
            <div class="container">
                <p><span class="font-weight-bold">Numero de teléfono: </span><?= $miembro['numero_celular'] ?></p>
            </div>
            <div class="container">
                <p><span class="font-weight-bold">Correo electronico: </span><?= $miembro['email'] ?></p>
            </div>
            <div class="container">
                <p><span class="font-weight-bold">Registrado en: </span><?= $miembro['created_at'] ?></p>
            </div>
            <div class="d-flex">
                <a href="/miembros/<?=$miembro['id']?>/edit"
                    class="btn btn-primary mx-1">
                    Editar miembro
                </a>
                <form action="/miembros/<?= $miembro['id'] ?>/delete" method="POST">
                    <button class="btn btn-primary btn-danger mx-1">
                        Eliminar miembro
                    </button>
                </form>
            </div>
    </div>
</body>
</html>