<?php
$id = $_REQUEST["id"];
$user = 'root';
$pass = '';
$pdo = new PDO('mysql:host=localhost;dbname=webscrp', $user, $pass);
$sql="SELECT * FROM Product where ProdID =" . $id;
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
echo $result["Name"];
echo '<section id="prod1" class="marginBottom">
		<img src="lib/img/test.jpg" style="width:100px;"/>
		<a href="product.php?id="'. $id .'><h2>' . $result["Name"] . '</h2></a>
		<p id="productDesc" class="shortProductDesc">' . $result["Description"] . '</p>
		<p id="categoryNum" class="hidden"><p id="prodCategory">Computers > Laptops</p>
		<aside class="price">£
		<p id="price" class="sameLine">' . $result["Price"] . '</p>
			<img src="lib/img/basket.png" style="width:50px;" alt="Add to basket...">
		</aside>
</section>';

$pdo = null;
?>
