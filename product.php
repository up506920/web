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
<section id="productDetails" class="contentright">
	<h2 id="prodName" class="contentTitle">HP Laptop</h2><!-- Have this get from DB with an id etc-->
	<section id="prod">
		<img src="lib/img/test.jpg"/ class="imageHover">
		<section id="priceAndBasket">
			<p class="sameLine">Price: </p><p id="price" class="priceText">£499.99</p><br/>
			<p class="sameLine">Stock: </p><p class="inStock">In Stock <em>(20)</em></p> <!--Make dynamic depending on stock--><br/><br/>
			<p class="sameLine">Quantity: </p><select>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<input type="submit" title="Add To Basket" value="Add To Basket" />
		</section>
		<p class="productDesc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultricies, eros et sagittis facilisis, elit lacus suscipit erat, in consequat sem velit nec lacus. In fringilla aliquet neque, vestibulum luctus libero tempor id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut mattis, quam at vulputate porttitor, sem eros ultrices est, ut volutpat nibh lorem sit amet tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas auctor facilisis nisi, eget commodo odio. Fusce eu lacus pellentesque, auctor orci eget, porttitor purus. Nulla dignissim vulputate nisi, vel egestas diam sollicitudin non. Pellentesque gravida lorem in dolor congue, nec scelerisque erat hendrerit. Sed aliquet dui et eros finibus pharetra. Mauris libero augue, euismod sodales lacus vitae, condimentum suscipit purus. Nullam at ligula malesuada, lobortis est ac, dapibus leo. Vestibulum dolor risus, viverra id fringilla et, aliquet non mauris. Etiam lobortis fermentum interdum.

Vestibulum tellus risus, venenatis vitae lorem pharetra, feugiat consectetur leo. Duis ipsum elit, sagittis et tincidunt vel, volutpat ac augue. Aenean accumsan a nulla a semper. Praesent nec felis eget nulla efficitur venenatis vitae non dui. Morbi id purus tincidunt urna volutpat tincidunt. Vivamus ex arcu, eleifend vel vestibulum ac, venenatis a felis. Sed sollicitudin nulla dignissim nunc aliquam, sit amet ultrices diam gravida. Phasellus nec nibh vel felis tincidunt mollis. Aliquam condimentum libero convallis nulla lacinia dictum. Suspendisse in lectus vitae augue rutrum placerat. Praesent eros mi, pharetra sed placerat sed, ultricies eget sem.

Quisque hendrerit commodo nibh, eget cursus orci dignissim et. Integer id tellus a nulla convallis porta. Vestibulum interdum sem egestas consectetur imperdiet. Cras eget elementum felis. Cras mi nisi, varius a nisi eget, auctor semper arcu. Mauris consectetur eu ex vitae sodales. Nunc tempor aliquam libero, et interdum lacus tempus nec. Aliquam sodales, magna ut tempor porttitor, nunc nibh efficitur ligula, eget egestas lacus neque eget arcu. Proin lobortis nibh non commodo volutpat. Ut at ex molestie, vehicula nulla finibus, auctor enim. Vestibulum vehicula arcu turpis, at placerat mi ornare a. Quisque sed euismod magna.
</p>
	</section>
</section>
</section>
<?php
include( "include/footer.php" );
?>
