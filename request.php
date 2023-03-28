<?php
require_once "connect_db.php";


$sqlQuery = 'SELECT * FROM pokemon';
$recipesStatement = $conn->prepare($sqlQuery);
$recipesStatement->execute();
$pokemon = $recipesStatement->fetchAll();



