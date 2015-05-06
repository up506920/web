<?php include( "api/catget.php"); ?>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
	<?php 
	foreach($json as $key => $value){
	echo '<li id="c' . $value["CatID"] . '"><a id="c' . $value["CatID"] . '" href="#', $value["CatID"], '">', $value["CatName"], '</a>
		</li>';
	}
	?>
	</ul>
</nav>