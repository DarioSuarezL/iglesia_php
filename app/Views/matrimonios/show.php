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
        <div class="border bg-secondary">
            <div class="border m-4 p-2 bg-white">
                <h2 class="text-center">LA IGLESIA CRISTO REY OTORGA EL PRESENTE</h2>
                <h1 class="text-center">CERTIFICADO DE MATRIMONIO</h1>
                <div class="col">
                    <img src="https://media.istockphoto.com/id/1320279559/es/vector/icono-vectorial-doodle-de-la-iglesia-dibujo-de-ilustraci%C3%B3n-dibujado-a-mano-l%C3%ADnea-de-dibujos.jpg?s=612x612&w=0&k=20&c=dQaV6kNGrojLq0BECgljcd_gZ6ZImzzNxem3f9qbwRw=" alt="IGLESIA DIBUJO" class="mx-auto d-block" width="250px">
                    <h4 class="text-center">A la flamante pareja:</h4>
                    <h3 class="text-center"><?= $matrimonio['esposo']['nombre'] ?> y <?= $matrimonio['esposa']['nombre'] ?></h3>
                    <h4 class="text-center">
                        Que decidió unirse ante los ojos de nuestro señor con la ayuda de nuestro Pastor: <?= $matrimonio['pastor']['nombre'] ?> 
                    </h4>
                    <h4 class="text-center">
                        en fecha: <?= $matrimonio['fecha_matrimonio'] ?>
                    </h4>
                </div>
            </div>    
        </div>
        <div class="d-flex mt-5">
            <a href="/matrimonios/<?= $matrimonio['id'] ?>/edit" class="btn btn-primary mx-1">
                Editar matrimonio
            </a>
            <form action="/matrimonios/<?= $matrimonio['id'] ?>/delete" method="POST">
                <button class="btn btn-primary btn-danger mx-1">
                    Eliminar matrimonio
                </button>
            </form>
        </div>
    </div>
</body>

</html>