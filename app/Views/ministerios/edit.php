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
        <form action="/ministerios/<?= $ministerio['id'] ?>" method="POST">
            <h2 class="text-center">Editar ministerio número <?= $ministerio['id'] ?></h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text" class="form-control" value="<?= $ministerio['nombre'] ?>"/>
            </div>
            
            <button class="btn btn-primary" type="submit">
                Actualizar datos
            </button>
        </form>
    </div>
    
</body>
</html>