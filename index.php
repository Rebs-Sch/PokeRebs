<?php

$pokemons_api = file_get_contents ('https://pokeapi.co/api/v2/pokemon');
$pokemons = json_decode($pokemons_api, true);

for($i = 0; $i <20; $i++){
    $pokemon = $pokemons['results'][$i];

    $todas_infos_api = file_get_contents ($pokemon['url']);
    $pokemons['results'][$i] = json_decode($todas_infos_api, true);
}

if(isset($_GET['campo_busca'])){
    foreach ($pokemons as $poke){
        if (str_contains($poke['name'], $_GET['campo_busca']))
        $encontrados[] = $poke;
        $pokemons = $encontrados;
    }
}

$_GET['campo_busca'];

?>

<html>
<head>
    <title>PokeRebs</title>

    <style>
        #pesquisa{
            background: yellow;
            font-family: Verdana, Geneva, Tahoma, arial;
            padding: 20px;
            text-align: center;
        }

        .pokemon{
            width: 15%;
            border: solid 5px #666;
            padding: 15px;
            margin: 10px;
            float: left;
        }

        .pokemon img{
            max-width: 100%;
            height: 150px;
        }

    </style>
</head>

<body>
    <div id="pesquisa">
        <form method = "get">
            <input type="text" name="campo_buscar" placeholder="Digite um pokemon">
            <input type="submit" value="BUSCAR">
        </form>
    </div>

    <div id="pokemons">
    <?php for ($i = 0; $i < 20; $i++): ?>    
    <div class="pokemon">
            <img src=<?= $pokemons['results'][$i]['sprites']['other']['dream_world']['front_default']?> alt="Raichu" width="200px">

            <h1><?= $pokemons['results'][$i]['name']?></h1>
            <p>peso: 30.0kg</p>
            <p>altura: 0.8m</p>
        </div>
        <?php endfor; ?>
    </div>

</body>
</html>
