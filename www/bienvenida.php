<?php

    include( "clases/Graficos.php" );
    $objeto_graficos = new Graficos();

?>

<html>
    <head>
        <title></title>
    </head>

    <body>

        <?= $objeto_graficos->traer_fecha_bd() ?>

        <?= $objeto_graficos->probar_funcionamiento( "Mensaje de ok" ) ?>

    </body>

</html>