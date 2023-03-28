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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>