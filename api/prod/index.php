<?php
//Products API
//@author 506920


/*$id = intval($_GET['id']);

$connect = mysqli_connect('localhost','root','','webscrp');

mysqli_select_db($connect,"webscrp");
$sql="SELECT * FROM Product WHERE id = '".$id."'";
$result = mysqli_query($connect,$sql);
$rows = array();


echo $result;*/



$id = intval($_GET['id']);

//PDO stuff 

$user = 'root';
$pass = '';
$pdo = new PDO('mysql:host=localhost;dbname=webscrp', $user, $pass);
$sql = $pdo->prepare("SELECT * FROM Product WHERE ProdID=?");
$sql->execute(array($id));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($json);

$pdo = null;