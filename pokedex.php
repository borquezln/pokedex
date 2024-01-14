<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>

<body>
    <?php
    for ($id = 1; $id < 152; $id++) {
        $canal = curl_init();
        $url = "https://pokeapi.co/api/v2/pokemon/" . $id;

        curl_setopt($canal, CURLOPT_URL, $url);
        curl_setopt($canal, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($canal);

        if (curl_errno($canal)) {
            $error = curl_error($canal);
            echo "Error " . $error . " al conectarse a la API";
        } else {
            curl_close($canal);

            $pokemon = json_decode($respuesta, true);

            echo '<a href="https://www.pokemon.com/el/pokedex/' . $pokemon["name"] . '">';
            echo "<h1>" . $pokemon["id"] . " - " . ucfirst($pokemon["name"]) . "</h1>";
            echo "</a>";
        }
    }
    ?>
</body>

</html>