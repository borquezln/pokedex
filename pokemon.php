<?php
require "parciales/head.php";
require "funciones.php";
?>

<body>
    <?php
    $id = $_GET["id"];
    if (!$id || $id < 1 || $id > 1025) {
        header("Location: /pokedex.php");
    }

    $url = "https://pokeapi.co/api/v2/pokemon/" . $id;
    $canal = curl_init();
    $respuesta = conexion($canal, $url);

    if (curl_errno($canal)) {
        $error = curl_error($canal);
        echo "Error " . $error . " al conectarse a la API";
    } else {
        curl_close($canal);

        $pokemon = json_decode($respuesta, true);
    ?>
        <h1>
            <?= $pokemon["id"] . " - " . ucfirst($pokemon["name"]) ?>
        </h1>

        <label for="front">
            <img id="front" src="<?= $pokemon["sprites"]["front_default"] ?>">
            Frente
        </label>
        <label for="back">
            <img id="back" src="<?= $pokemon["sprites"]["back_default"] ?>">
            Dorso
        </label>
    <?php
    }
    ?>
</body>

</html>