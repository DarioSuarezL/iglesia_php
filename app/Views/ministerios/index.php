<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="p-4">
        <h1><?php echo $title ?></h1>
    
        <a href="/" class="btn btn-primary" >← Volver</a>
        <a href="/ministerios/create" class="btn btn-primary" >Crear ministerio</a>
        <form action="/ministerios/undo" method="POST">
            <button type="submit" class="btn btn-secondary" >Deshacer ultimo cambio</button>
        </form>

    
        <?php foreach($ministerios as $ministerio): ?>
            <li>
                <a href="/ministerios/<?= $ministerio['id'] ?>">
                    <?= $ministerio['nombre'] ?>
                </a>
            </li>
        <?php endforeach; ?>



    </div>

    
</body>
</html>