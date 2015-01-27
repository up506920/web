<?php
$id = intval($_GET['id']);

$connect = mysqli_connect('localhost','root','','webscrp');

mysqli_select_db($connect,"webscrp");
$sql="SELECT * FROM Product WHERE id = '".$id."'";
$result = mysqli_query($connect,$sql);
$rows = array();
wh


echo