<?php
	include 'core/controller.php';
	new Config();
	PageAccess::userSessionChecker();
?>
<html>
<head><?php Designer::head(Config::title()); ?></head>
<body>
<?php
	Designer::navbar(Config::title(),"index.php","Forum","forum.php","Contact Us","contact.php","Login","login.php","Register","register.php"); 
	Designer::disclaimer();
	Designer::forum();
	Designer::footer(Config::author());
	Designer::javascript();
?>
</body>
</html>