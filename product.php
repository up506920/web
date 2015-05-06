<?php
include( "include/header.php" );
$urlid = intval($_GET['id']);
require( "api/prod/index.php");
$data = json_decode($json,true);
if(isset($data['Name'])){
	$prodName = $data['Name'];
	$price = $data['Price'];
	$description = $data['Description'];
	$catID = $data['CatID'];
	$stock = $data['Stock'];
	}
else
	{
	$error = 'Product does not exist.';
	}
include( "include/nav.php");
?>
<p id="urlid" class="hidden"><?php echo $urlid ?></p>
<p id="catid" class="hidden"><?php echo $catID ?></p>
<p id="stocknum" class="hidden"><?php echo $stock ?></p>
<p id="error" class="hidden"><?php 
if(isset($error)){ echo $error; } ?>
</p>

<section id="productDetails" class="contentright hidden">
	<h2 id="prodName" class="contentTitle"><?php echo $prodName ?></h2><!-- Have this get from DB with an id etc-->
	<section id="prod">
		<img src="lib/img/prods/<?php echo $id; ?>.jpg" class="imageHover" onError="this.src='lib/img/prods/Default-Icon-icon.png'";>
		<section id="priceAndBasket">
			<p class="sameLine">Price: </p><p id="price" class="priceText">£<?php echo $price ?></p><br/>
			<p class="sameLine">Stock: </p>
			<?php if($stock > 0){
			$stockText = "In Stock";
			$stockColour = "green";
			}
			else{
			$stockText = "Out of Stock";
			$stockColour = "red";
			}?>
			<p class="inStock" style="color:<?php echo $stockColour?>">
			
			<?php echo $stockText ?><em>(<?php echo $stock ?>)</em></p> <!--Make dynamic depending on stock--><br/><br/>
			<form>
			<p class="sameLine">Quantity: </p><select id = "qty">
			</select>
			<input id="add" type="button" title="Add To Basket" value="Add To Basket"/>
			</form>
		</section>
		<p class="productDesc"><?php echo $description?>
</p>
	</section>
</section>
</section>
<script>

var qtySelect = document.getElementById("qty");
var id = document.getElementById("urlid").innerHTML;
var submit = document.getElementById("add");



function makeQuantityOptions(){
//Take the number of items in stock from PHP, loop through to add the options to the qty select.
//if page has error, inform user and redirect
var errorMsg = document.getElementById("error").innerHTML;
if(errorMsg.length > 0){
	document.getElementById("productDetails").innerHTML = "<h2>Product not found</h2><p>Click <a href='index.php'>here</a> to return to the homepage</h2>"
	document.getElementById("productDetails").className = "contentright";
}
else
//Continue with page load
{
document.getElementById("productDetails").className = "contentright";
var stockNum = document.getElementById("stocknum").innerHTML;
var stockOptions = "";
for (var i=1; i <= stockNum; i++) {
	stockOptions += "<option value=" + i + ">" + i + "</option>";
}
qtySelect.innerHTML = stockOptions;

}
}

function addToSession(response){
//Pop up with 
window.alert(response);
location.reload();
//Update stock

}

addToCart = function(){
//if QTY 
var qty = qtySelect.options[qtySelect.selectedIndex].value;
AjaxGet('api/addtocart.php?id='+id+'&qty='+qty, addToSession);
}



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
submit.addEventListener("click", addToCart);

window.onload = makeQuantityOptions;

</script>
<?php
include( "include/footer.php" );
?>
