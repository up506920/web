	<?php if (file_exists("../api/settings.php")) {
			include("../api/settings.php"); 
			}
			include("lib/cmsheader.php"); ?>
<section id="content" class="contentcenter">
<nav id="portalchooser">
	<ul>
		<li id="prodAdmin"><a href="prodAdmin">Product Admin</a></li>
		<li id="salesAdmin"><a href="salesAdmin">Sales Admin</a></li>
	</ul>
</nav>

</section>
<?php
include( "../include/footer.php" );
?>