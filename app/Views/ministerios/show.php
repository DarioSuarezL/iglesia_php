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
            <h2 class="text-center">Datos del ministerio número: <?= $ministerio['id'] ?></h2>
            <div class="container">
                <p><span class="font-weight-bold">Nombre: </span><?= $ministerio['nombre'] ?></p>
            </div>

            <div class="container">
                <p><span class="font-weight-bold">Creado en: </span><?= $ministerio['created_at'] ?></p>
            </div>
           
            <div class="d-flex">
                <a href="/ministerios/<?=$ministerio['id']?>/edit"
                    class="btn btn-primary mx-1">
                    Editar ministerio
                </a>
                <form action="/ministerios/<?= $ministerio['id'] ?>/delete" method="POST">
                    <button class="btn btn-primary btn-danger mx-1">
                        Eliminar ministerio
                    </button>
                </form>
            </div>
    </div>
</body>
</html>