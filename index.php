<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=pokemon_api", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$sqlQuery = 'SELECT * FROM pokemon';
$recipesStatement = $conn->prepare($sqlQuery);
$recipesStatement->execute();
$pokemon = $recipesStatement->fetchAll();


$clients_max = 10;
foreach ($pokemon as $pokemons) {
?>
    <?php 
    $id = $pokemons['id'];
    $name = $pokemons['identifier'];
    ?>
    

<?php
    echo $id;
    echo $name;
}