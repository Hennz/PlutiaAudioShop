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
	Designer::container(DBAction::select("barang", "idbarang", "1", "namabarang"),DBAction::select("barang", "idbarang", "1", "deskripsi"),DBAction::select("barang", "idbarang", "1", "harga"),DBAction::select("barang", "idbarang", "1", "foto"));
	Designer::catalog("Other Product","login.php",DBAction::select("barang", "idbarang", "2", "foto"),"login.php",DBAction::select("barang", "idbarang", "3", "foto"),"login.php",DBAction::select("barang", "idbarang", "3", "foto"));
	Designer::footer(Config::author());
	Designer::javascript();
?>
</body>
</html>