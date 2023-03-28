<?php
require_once "request.php";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Pokedex</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Type</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>001</td>
				<td>Bulbasaur</td>
				<td>Grass/Poison</td>
				<td><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png"></td>
			</tr>
			<tr>
				<td>002</td>
				<td>Ivysaur</td>
				<td>Grass/Poison</td>
				<td><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/2.png"></td>
			</tr>
			<tr>
				<td>003</td>
				<td>Venusaur</td>
				<td>Grass/Poison</td>
				<td><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png"></td>
			</tr>
			<!-- Add more rows for other Pokemon -->
		</tbody>
	</table>
</body>
</html>