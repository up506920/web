<?php include( "api/catget.php"); ?>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
	<?php 
	foreach($json as $key => $value){
	echo '<li id="', $value["CatID"], '"><a id ="', $value["CatID"], '" href="#', $value["CatID"], '">', $value["CatName"], '</a>
		</li>';
	}
	?>
	</ul>
</nav>