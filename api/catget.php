<?php
//Category GET
$user = 'root';
$pass = '';
$pdo = new PDO('mysql:host=localhost;dbname=webscrp', $user, $pass);
$sql="SELECT * FROM Category";
$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>