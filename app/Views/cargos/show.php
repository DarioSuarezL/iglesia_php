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
        <h2 class="text-center">Datos del cargo número: <?= $cargo['id'] ?></h2>
        <div class="container">
            <p><span class="font-weight-bold">Nombre: </span><?= $cargo['nombre'] ?></p>
        </div>

        <div class="container">
            <p><span class="font-weight-bold">Descripción: </span><?= $cargo['descripcion'] ?></p>
        </div>

        <div class="container">
            <p><span class="font-weight-bold">Ministerio: </span><?= $cargo['ministerio_id'] ?></p>
        </div>

        <div class="container">
            <p><span class="font-weight-bold">Creado en: </span><?= $cargo['created_at'] ?></p>
        </div>

        <div class="d-flex">
            <a href="/cargos/<?= $cargo['id'] ?>/edit" class="btn btn-primary mx-1">
                Editar cargo
            </a>
            <form action="/cargos/<?= $cargo['id'] ?>/delete" method="POST">
                <button class="btn btn-primary btn-danger mx-1">
                    Eliminar cargo
                </button>
            </form>
        </div>
    </div>
</body>

</html>