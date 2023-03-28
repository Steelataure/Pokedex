<?php
require_once "connect_db.php";


$sqlQuery = 'SELECT * FROM pokemon';
$recipesStatement = $conn->prepare($sqlQuery);
$recipesStatement->execute();
$pokemon = $recipesStatement->fetchAll();


$clients_max = 10;
foreach ($pokemon as $pokemons) {

    $id = $pokemons['id'];
    $name = $pokemons['identifier'];
    
    echo $id;
    echo $name;
}