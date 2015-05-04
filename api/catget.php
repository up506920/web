<?php
//Category GET
require_once("settings.php");
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
$sql="SELECT * FROM Category";
$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;
if(isset($_GET["response"])){
echo(json_encode($json));
}
?>