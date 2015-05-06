<?php if (file_exists("../../api/settings.php")) {
			include("../../api/settings.php"); }
			include("../lib/cmsheader.php"); ?>
			<script src ='../../lib/ajaxget.js'></script>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
		<li><a href="#1">Sales Report</a>
		</li>
		<li><a href="#2">Stock Level Report</a>
		</li>
		<li><a href="#3">Cash Taken Report</a>
		</li>
	</ul>
</nav>
<section id="salesAdmin" class="contentright">
	<section id="form">
		<h2 class="header">Click on the links to the left to do different tasks</h2>
	</section>
	
</section>
</section>
<script src ='lib/salesadmin.js'></script>
<?php
include( "../../include/footer.php" );
?>

