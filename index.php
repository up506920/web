<?php
$title="Shop Name Here"; //pull this from the DB when installed?
include( "include/header.php" );
?>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
		<li id="1"><a href="#1">Computers</a>
			<ul class="submenu">
				<li><a href="#">Laptops</a></li>
				<li><a href="#">Desktops</a></li>
				<li><a href="#">Tablets</a></li>
			</ul>
		</li>
		<li id="2"><a href="#2">Cameras</a>
			<ul class="submenu">
				<li><a href="#">SLR</a></li>
				<li><a href="#">Compact</a></li>
			</ul>
		</li>
		<li id="3"><a href="#3">Films</a>
			<ul class="submenu">
				<li><a href="#">Blu-Ray</a></li>
				<li><a href="#">DVD</a></li>
			</ul>
		</li>
		<li id="4"><a href="#4">Sports</a></li>
	</ul>
</nav>
<section id="products" class="contentright">
	<h2>Popular Products</h2>
	<section id="prod1">
		<img src="lib/img/test.jpg"/ style="width:100px;"/>
		<a href="product.php"><h2>HP Laptop</h2></a> <!-- Have this get from DB with an id etc-->
		<p class="productDesc">Test description, test test test...</p>
		<aside id="price" class="price">
			£499.99
			<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket...">
		</aside>
	</section>
	<section id="prod1">
		<img src="lib/img/test.jpg"/ style="width:100px;"/>
		<a href="product.php"><h2>HP Laptop</h2></a> <!-- Have this get from DB with an id etc-->
		<p class="productDesc">Test description, test test test...</p>
		<aside id="price" class="price">
			£499.99
			<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket...">
		</aside>
	</section>
	<section id="prod1">
		<img src="lib/img/test.jpg"/ style="width:100px;"/>
		<a href="product.php"><h2>HP Laptop</h2></a> <!-- Have this get from DB with an id etc-->
		<p class="productDesc">Test description, test test test...</p>
		<aside id="price" class="price">
			£499.99
			<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket...">
		</aside>
	</section>
	<section id="prod1">
		<img src="lib/img/test.jpg"/ style="width:100px;"/>
		<a href="product.php"><h2>HP Laptop</h2></a> <!-- Have this get from DB with an id etc-->
		<p class="productDesc">Test description, test test test...</p>
		<aside id="price" class="price">
			£499.99
			<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket...">
		</aside>
	</section>
	<section id="prod1">
		<img src="lib/img/test.jpg"/ style="width:100px;"/>
		<a href="product.php"><h2>HP Laptop</h2></a> <!-- Have this get from DB with an id etc-->
		<p class="productDesc">Test description, test test test...</p>
		<aside id="price" class="price">
			£499.99
			<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket...">
		</aside>
	</section>
</section>
</section>
<?php
include( "include/footer.php" );
?>
