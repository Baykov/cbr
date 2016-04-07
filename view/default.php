<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once('parts/head.php'); ?>
	</head>
	<body>
		<div id="wrapper">
			<?php require_once('parts/nav.php'); ?>
			<?php require_once('parts/'.$this->view.'.php'); ?>
		</div>
	</body>
</html>
