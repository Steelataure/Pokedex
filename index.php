<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<?php

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);
require_once "header.php";
require_once "navigation.php";
$minmissions = file_get_contents('https://api-pokemon-fr.vercel.app/api/v1/pokemon', false, stream_context_create($arrContextOptions));
$response = json_decode($minmissions, true); 

?>
<body>
	<table class="table-striped" id="example">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Nom</th>
				<th>Type</th>
                <th>Poids</th>
                <th>Taille</th>
                <th>Détail</th>
			</tr>
		</thead>
		<tbody>
			<?php 
                //boucle sur l'array
                foreach($response as $key => $row):
                    if ($key < 1) continue;

                     
                    $id = $row['pokedexId'];
                    $image = $row['sprites']["regular"];
                    $weight = $row['weight'];
                    $height = $row['height'];
                    $name_type = "";
                    $name = $row["name"]['fr'];
                    

                    if ($row["types"][0]['name'] && $row["types"][1]['name']):
                        $type = $row["types"][0]['name'] .  "/" . $row["types"][1]['name'];
                    elseif ($row["types"][0]['name']):
                        $type = $row["types"][0]['name'];
                    endif;
                    ?> 
                    <tr>
                    <td> <?= $id ?></td>
                    <td><img src="<?= $image ?>"></td>
                    <td> <?=  $name  ?></td>
                    <td> <?= $type ?></td>
                    <td> <?= $weight ?></td>
                    <td> <?= $height ?></td> 
                    <td><a type="button" class="btn btn-dark" onclick="window.location.href='detail.php?id=<?= $id ?>'">Detail</button>
                    </td>   
                    </tr>
                    <?php
                endforeach;
            ?>
		</tbody>
	</table>
</body>
</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
