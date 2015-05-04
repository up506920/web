<?php
//Search script. Returns JSONs of top 3 that match the string
//Author 506920
$str = strval($_GET['str']);

//PDO stuff 

$user = 'root';
$pass = '';
$pdo = new PDO('mysql:host=localhost;dbname=webscrp', $user, $pass);
$sql = $pdo->prepare("SELECT * FROM Product INNER JOIN Category on Product.CatID = Category.CatID WHERE Product.Name LIKE :prod ORDER BY product.name LIMIT 3");
$sql->execute(array(":prod" => "%" . $str . "%"));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($json);

$pdo = null;
?>