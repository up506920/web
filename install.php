<?php
session_start(); 
session_destroy();
$rootURL = substr(getenv('HTTP_HOST') . $_SERVER['REQUEST_URI'], 0, -11);
?>
<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" title="Common" href="lib/CommonScripts.css">
		<meta charset="UTF-8">
		<title>Daintree Shopping System</title> 
	</head>
	<body> 
		<section id="container">
		<header>
			<h1><a href="install.php">Daintree Shopping System</a></h1>
			</header>
<section id="install" class="contentright">
	<h2 id="installHeader">Install</h2><br/><br/>
<form id="addprods" class="cmsform" method="POST" action="api/installscript.php">
		<label for="dbhost">Database Host Address</label>
		<input type="text" id="dbhost" name="dbhost" value="localhost"><br/>
		<label for="dbuser">Database Username</label>
		<input type="text" id="dbuser" name="dbuser" value="root"><br/>
		<label for="dbpassword">Database Password</label>
		<input type="password" id="dbpassword" name="dbpassword"><br/>
		<label for="companyName">Company Name</label>
		<input type="text" id="companyName" name="companyName"><br/>
		<input type="hidden" class="hidden" id="rootURL" name="rootURL" value="<?php echo $rootURL;?>"></input>
        <br/>
		<button id="install" type="submit">Install</button>
		</form>
</section>
</section>
</section>

