<?php if (file_exists("../../api/settings.php")) {
			include("../../api/settings.php"); }
			include("../lib/cmsheader.php"); ?>
			<script src ='../../lib/ajaxget.js'></script>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
		<li id="1"><a href="#1">Add Products</a>
		</li>
		<li id="2"><a href="#2">Edit/Remove Products</a>
		</li>
		<li id="3"><a href="#3">Edit Categories</a></li>
	</ul>
</nav>
<section id="prodAdmin" class="contentright">
	<section id="form">
		<h2 class="header">Click on the links to the left to do different tasks</h2>
		<!--<form id="addprods" class="cmsform" method="POST">
		<label for="name">Product Name</label>
		<input type="text" id="name"><br/>
		<label for="desc">Description</label>
		<input type="text" id="desc"><br/>
		<label for="price">Price</label>
		<input type="text" id="price"><br/>
		<label for="stock">Stock</label>
		<input type="text" id="stock"><br/>
		<label for="category">Category</label>
		<Select type="text" id="category"><br/>
		?php/* 
	foreach($json as $key => $value){
	echo '<option value="', $value["CatID"], '">', $value["CatName"], '</option>';
	}
	?>
		</select><br/><br/>
		<button id="submitProd" type="submit">Add Product</button>
		</form>
		<form id="editprods" class="hiddenform" method="POST">
		<p class="hiddenform" style="font-size:1px;" id="allprods"><?php include( "../../api/prodget.php"); ?></p>
		<label for="name">Product Name</label>
		<input type="text" id="name"><br/>
		<label for="desc">Description</label>
		<input type="text" id="desc"><br/>
		<label for="price">Price</label>
		<input type="text" id="price"><br/>
		<label for="stock">Stock</label>
		<input type="text" id="stock"><br/>
		<label for="category">Category</label>
		<Select type="text" id="category"><br/>
		</select><br/><br/>
		<button id="submitProd" type="submit">Add Product</button>
		</form> -->
		
	</section>
	
</section>
</section>
<script src ='lib/prodadmin.js'></script>
<?php
include( "../../include/footer.php" );
?>