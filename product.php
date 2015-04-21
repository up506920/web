<?php
include( "include/header.php" );
$urlid = intval($_GET['id']);
include( "api/prod/index.php");
$data = json_decode($json,true);
$prodName = $data[0]['Name'];
$price = $data[0]['Price'];
$description = $data[0]['Description'];
$catID = $data[0]['CatID'];
include( "include/nav.php");
?>
<p id="urlid" class="hidden"><?php echo $urlid ?></p>
<p id="catid" class="hidden"><?php echo $catID ?></p>

<section id="productDetails" class="contentright">
	<h2 id="prodName" class="contentTitle"><?php echo $prodName ?></h2><!-- Have this get from DB with an id etc-->
	<section id="prod">
		<img src="lib/img/prods/<?php echo $id; ?>.jpg" class="imageHover">
		<section id="priceAndBasket">
			<p class="sameLine">Price: </p><p id="price" class="priceText">£<?php echo $price ?></p><br/>
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
		<p class="productDesc"><?php echo $description?>
</p>
	</section>
</section>
</section>
<script>

goHomeAndHighlight = function(){
var catClicked = document.querySelector(".sidebar > li:hover > a");
window.location.href = "index.php?#" + catClicked.id;
}
var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");
var catID = document.getElementById("catid").innerHTML;
var clicked = document.querySelector(".sidebar > li:target > a");
for (var i = 0; i < sidebarLinks.length; i++) {
//detect if category link has been highlighted/added to url already, if not, do it.
if(sidebarLinks[i].id == catID && (clicked == null && window.location.href.indexOf("#") <= -1))
{
	window.location.href = window.location.href + "#" + catID;
}
sidebarLinks[i].addEventListener("click", goHomeAndHighlight);
}

</script>
<?php
include( "include/footer.php" );
?>
