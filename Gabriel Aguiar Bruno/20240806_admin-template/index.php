<?php
include_once('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Emilus</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/vendors/fontawesome-free-6.6.0-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>

	<div class="main-container">
		<?php include_once('includes/header.php'); ?>
		<div class="mc-bottom">
			<?php include_once('includes/menu.php'); ?>
			<section class="main-content">
				<div class="main-content-inside">
					<?php
					$page_default = 'inicial';
					$page = $page_default;
					if (!empty($_GET['page'])) {
						$page = $_GET['page'];
					}
					$page_url = 'pages/' . $page . '.php';
					if (file_exists($page_url)) {
						include_once($page_url);
					}else{
						include_once('pages/' . $page_default . '.php');
					}
					?>
				</div>
			</section>
		</div>
	</div>

</body>

</html>