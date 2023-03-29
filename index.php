<!DOCTYPE html>
<html>
<?php
require_once "request.php";
require_once "header.php";
require_once "navigation.php";
?>
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
                <th>Detail</th>
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
                    <td><button type="button" class="btn btn-dark" onclick="window.location.href='detail.php/?id=<?= $id ?>'">Detail</button>
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
