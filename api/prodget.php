<?php
$user = 'root';
$pass = '';
$pdo = new PDO('mysql:host=localhost;dbname=webscrp', $user, $pass);
$sql="SELECT * FROM Product";
$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($json);

$pdo = null;
?>