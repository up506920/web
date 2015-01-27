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
	<h2 id="productTypes">All Products</h2>
	<?php
include( "include/smallprod.php" );
include( "include/smallprod.php" );
include( "include/smallprod.php" );
include( "include/smallprod.php" );
include( "include/smallprod.php" );
?>
	
</section>
</section>
<?php
include( "include/footer.php" );
?>
