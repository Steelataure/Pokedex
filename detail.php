<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/detail.css">
</head>
<?php

require_once "request.php";
require_once "header.php";
require_once "navigation.php";

$minmissions = file_get_contents('https://api-pokemon-fr.vercel.app/api/v1/pokemon/'.$_GET['id']);
$response = json_decode($minmissions, true); 

$id = $response['pokedexId'];
$pv = $response['stats']['hp'];
$atk = $response['stats']['atk'];
$def = $response['stats']['def'];
$spe_atk = $response['stats']['spe_atk'];
$spe_def = $response['stats']['spe_def'];
$vit = $response['stats']['vit'];
$cat = $response['category'];

$image = $response['sprites']["regular"];
$shiny = $response['sprites']["shiny"];
$weight = $response['weight'];
$height = $response['height'];
$talents = $response["talents"][0]['name']."/".$response["talents"][1]['name'];
$type = "";
$first_type = $response["types"][0]['name'];
$name = $response["name"]['fr'];
if ($response["types"][0]['name'] && $response["types"][1]['name']):
    $type = $response["types"][0]['name'] .  "/" . $response["types"][1]['name'];
elseif ($response["types"][0]['name']):
    $type = $response["types"][0]['name'];
endif;
//print_r($response);
?>
<body>
    <div class="detail">
    <table>
    <tr>
        <td colspan="4"><h2><?= $name." - ".$cat?></h2></td>
    </tr>
    <tr>
        <td><img src="<?= $image?>" alt="Bulbizarre"></td>
        <td><img src="<?= $shiny?>" alt="Bulbizarre"></td>
        <td>
        <ul>
            <li><strong>Type :</strong> <?= $type?></li>
            <li><strong>Taille :</strong> <?= $height?></li>
            <li><strong>Poids :</strong> <?= $weight?></li>
            <li><strong>Capacités : </strong><?= $talents?></li>    
            <li><strong>PV : </strong><?= $vit?></li>     
            <li><strong>Attaque : </strong><?= $atk?></li>            
            <li><strong>Défense : </strong><?= $def?></li>  
            <li><strong>Attaque Spé. : </strong><?= $spe_atk?></li>      
            <li><strong>Défense Spé. : </strong><?= $spe_def?></li>     
            <li><strong>Vitesse : </strong><?= $vit?></li>       
        </ul>
        </td>
    </tr>
    </table>
    <br/>
<div class="evol">
    Famille d'évolution de <?= $response["name"]['fr']; ?><br>
    <?php
	
	foreach ($response["evolution"]['pre'] as $evolution)
	{
		?>
		<img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $evolution['pokedexId'] ?>/regular.png">
		<?php
		echo $evolution['name']  . "<br/>";
	}
	
	?> <img src=" <?= $response['sprites']['regular'] ?>"><?php
    echo $response["name"]['fr'] . "<br/>";
	
	foreach ($response["evolution"]['next'] as $evolution)
	{
		?>
		<img src="https://raw.githubusercontent.com/Yarkis01/PokeAPI/images/sprites/<?= $evolution['pokedexId'] ?>/regular.png">
		<?php
		echo $evolution['name']  . "<br/>";
	}
    ?>
</div>
</body>
</html>
