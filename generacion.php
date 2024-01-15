<?php
require "parciales/head.php";
require "funciones.php";
?>

<body>
    <?php
    $id = $_GET["id"];
    if (!$id || $id < 1 || $id > 9) {
        header("Location: /pokedex.php");
    }
    switch ($id) {
        case 1:
            $region = "Kanto"; $first = 1; $last = 151;
            break;
        case 2:
            $region = "Johto"; $first = 152; $last = 251;
            break;
        case 3:
            $region = "Hoenn"; $first = 252; $last = 386;
            break;
        case 4:
            $region = "Sinnoh"; $first = 387; $last = 493;
            break;
        case 5:
            $region = "Unova"; $first = 494; $last = 649;
            break;
        case 6:
            $region = "Kalos"; $first = 650; $last = 721;
            break;
        case 7:
            $region = "Alola"; $first = 722; $last = 809;
            break;
        case 8:
            $region = "Galar"; $first = 810; $last = 905;
            break;
        case 9:
            $region = "Paldea"; $first = 906; $last = 1025;
            break;
    }
    echo "<h1>" . $region . "</h1>";

    $canal = curl_init();
    for ($id = $first; $id <= $last; $id++) {
        $url = "https://pokeapi.co/api/v2/pokemon/" . $id;

        $respuesta = conexion($canal, $url);

        if (curl_errno($canal)) {
            $error = curl_error($canal);
            echo "Error " . $error . " al conectarse a la API";
        } else {


            $pokemon = json_decode($respuesta, true);

            echo '<a href="/pokemon.php?id=' . $pokemon["id"] . '">';
            echo $pokemon["id"] . " - " . ucfirst($pokemon["name"]) . "<br>";
            echo "</a>";
        }
    }
    curl_close($canal);
    ?>
</body>

</html>