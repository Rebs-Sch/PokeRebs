<?php

//$nome = readfile("Qual é o Pokémon de sua escolha?"); isso não precisa

$short = "p";
$long = ["pokemon:"];

$options = getopt($short, $long);
$nome = $options['pokemon'];

$dados = file_get_contents("https://pokeapi.co/api/v2/pokemon/($nome)");

$pokemon = json_decode($dados, true);

print($pokemon['name'] . "\n");
print("altura: " . $pokemon['height'] . "\n" );
print("peso: " . $pokemon['weight'] . "\n" );
print("movimentos:\n" );

foreach($pokemon['moves'] as $move){
    print(" - ". $move['move']['name']. "\n" );
}
