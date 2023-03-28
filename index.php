<?php
require_once "request.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pokedex</title>

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<table id="example">
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
                foreach ($pokemon as $pokemons) {                   
                    $id = $pokemons['id'];
                    $weight = $pokemons['weight'];
                    $height = $pokemons['height'];
                    $name_type = "";
                    $sqlRequest = "SELECT * FROM pokemon_types,`types` where pokemon_types.type_id = `types`.id and pokemon_id =".$id;
                    $recipesStatements = $conn->prepare($sqlRequest);
                    $recipesStatements->execute();
                    $types = $recipesStatements->fetchAll();
                    foreach ($types as $type){
                        if($name_type == ""){
                            $name_type = ucfirst($type['identifier']);
                        }else{
                            $name_type .= "/".ucfirst($type['identifier']);
                        }
                    }
                    $name = ucfirst($pokemons['identifier']);
                    echo "<tr>";
                    echo "<td>".$id."</td>";
                    echo "<td><img src=\"https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$id.".png\"></td>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$name_type."</td>";
                    echo "<td>".$weight."</td>";    
                    echo "<td>".$height."</td>";            
                    echo "</tr>";
                }
            ?>
		</tbody>
	</table>
</body>
</html>

<script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>

<script src="js/datatables.min.js">
    
    $(document).ready(function () {
    $('#example').DataTable();
});

</script>