<?php
require_once "request.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pokedex</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<table class="table-striped" id="example">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Name</th>
				<th>Type</th>
                <th>Weight</th>
                <th>Height</th>
			</tr>
		</thead>
		<tbody>
			<?php 
                foreach ($pokemon as $pokemons):                   
                    $id = $pokemons['id'];
                    $weight = $pokemons['weight'];
                    $height = $pokemons['height'];
                    $name_type = "";
                    $sqlRequest = "SELECT * FROM pokemon_types,`types` where pokemon_types.type_id = `types`.id and pokemon_id =".$id;
                    $recipesStatements = $conn->prepare($sqlRequest);
                    $recipesStatements->execute();
                    $types = $recipesStatements->fetchAll();

                    foreach ($types as $type):
                        if($name_type == ""):
                            $name_type = ucfirst($type['identifier']);
                        else:
                            $name_type .= "/".ucfirst($type['identifier']);
                        endif;
                    endforeach;
                    $name = ucfirst($pokemons['identifier']);
                    ?> 
                    <tr>
                    <td> <?= $id ?></td>
                    <td><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $id ?>.png"></td>
                    <td> <?= $name ?></td>
                    <td> <?= $name_type ?></td>
                    <td> <?= $weight ?></td>
                    <td> <?= $height ?></td>        
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
