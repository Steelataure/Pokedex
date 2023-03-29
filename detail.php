<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
  <?php
require "header.php";
require "navigation.php";

$minmissions = file_get_contents('https://api-pokemon-fr.vercel.app/api/v1/pokemon/'.$_GET['id']);
$response = json_decode($minmissions, true); 

?>
<div>
Famille d'évolution de <?= $response["name"]['fr']; ?><br><br/>
<?php

//SI A 2 EVOLUTIONS
if ($response["evolution"]['next'][0]['name'] && $response["evolution"]['next'][1]['name'])
{
  ?> <img src=" <?= $response['sprites']['regular'] ?>"><?php
  echo $response["name"]['fr'] . "<br/>";

  ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] + 1 ?>/regular.png"> <?php
  echo $response["evolution"]['next'][0]['name']  . "<br/>";
  
  ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] + 2 ?>/regular.png"> <?php
  echo $response["evolution"]['next'][1]['name'] . "<br/>";

}
//SI UNE SEULE EVOLUTION
elseif ($response["evolution"]['next'][0]['name'])
{
  if ($response["evolution"]['pre'][0]['name']){ //SI UNE ARRIERE ET UN EVOLUTION

    ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] - 1 ?>/regular.png"> <?php
    echo $response["evolution"]['pre'][0]['name'] . "<br/>"; 
    
    ?> <img src=" <?= $response['sprites']['regular'] ?>"> <?php
    echo $response["name"]['fr'] . "<br/>";
    
    ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] + 1 ?>/regular.png"> <?php
    echo $response["evolution"]['next'][0]['name'] . "<br/>";

  }
  else // SI PAS ARRIERE ET UNE EVOLUTION
  {
    ?> <img src=" <?= $response['sprites']['regular'] ?>"><?php
    echo $response["name"]['fr'] . "<br/>";

    ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] + 1 ?>/regular.png"> <?php
    echo $response["evolution"]['next'][0]['name'] . "<br/>";
  }
}
//SI 2 ARRIERES
elseif ($response["evolution"]['pre'][0]['name'] && $response["evolution"]['pre'][1]['name'])
{
  ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] - 2 ?>/regular.png"> <?php
  echo $response["evolution"]['pre'][0]['name'] . "<br/>";
  
  ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] - 1 ?>/regular.png"> <?php
  echo $response["evolution"]['pre'][1]['name'] . "<br/>";

  ?> <img src=" <?= $response['sprites']['regular'] ?>"><?php
  echo $response["name"]['fr'] . "<br/>";
}
//SI UN SEUL ARRIERE
elseif ($response["evolution"]['pre'][0]['name'])
{
  ?> <img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $_GET['id'] - 1 ?>/regular.png"> <?php
  echo $response["evolution"]['pre'][0]['name'] . "<br/>";

  ?> <img src=" <?= $response['sprites']['regular'] ?>"><?php
  echo $response["name"]['fr'] . "<br/>";

}
else //SI 0 FAMILLES
{
  ?> <img src=" <?= $response['sprites']['regular'] ?>"><?php
  echo $response["name"]['fr'] . "<br/>";
}

  
?>
</div>