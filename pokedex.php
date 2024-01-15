<?php
require "parciales/head.php";
require "funciones.php";
?>

<body>
    <?php
    $canal = curl_init();
    ?>

    <h1>Elija una generación</h1>
    <ol>
        <?php for ($id = 1; $id < 10; $id++) : ?>
            <li>
                <a href="/generacion.php?id=<?= $id ?>">
                    <?php
                    $url = "https://pokeapi.co/api/v2/generation/" . $id;
                    $respuesta = conexion($canal, $url);
                    $generacion = json_decode($respuesta, true);
                    echo ucfirst($generacion["main_region"]["name"]);
                    ?>
                </a>
            </li>
        <?php endfor ?>
    </ol>
</body>

</html>