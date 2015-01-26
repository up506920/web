<?php
$title="Shop Name Here"; //pull this from the DB when installed?
include( "include/header.php" );
?>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
		<li id="1"><a href="#1">Computers</a></li>
		<li id="2"><a href="#2">Cameras</a></li>
		<li id="3"><a href="#3">Films</a></li>
		<li id="4"><a href="#4">Sports</a></li>
	</ul>
</nav>
<section id="products" class="contentright">
	<section id="prod1">
		<img src="lib/img/test.jpg"/ style="width:100px;"/>
		<a href="prod1"><h2>HP Laptop</h2></a>
		<p class="productDesc">Test description, test test test...</p>
		<aside id="price">
			£499.99
			<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket...">
		</aside>
	</section>
</section>
</section>
<?php
include( "include/footer.php" );
?>
