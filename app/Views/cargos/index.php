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
    
        <a href="/cargos/create" class="btn btn-primary" >Crear cargo</a>
    
        <?php foreach($cargos as $cargo): ?>
            <li>
                <a href="/cargos/<?= $cargo['id'] ?>">
                    <?= $cargo['nombre'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </div>

    
</body>
</html>