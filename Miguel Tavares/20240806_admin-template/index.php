<?php
include_once('includes/connect.php');
?>
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/vendors/fontawesome-free-6.6.0-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<<<<<<< Updated upstream
=======
	
	<script src="assets/js/jquery-3.7.1.min.js"></script>
	<script src="assets/js/_qs.js"></script>
>>>>>>> Stashed changes
</head>

<body>

	<div class="main-container">
<<<<<<< Updated upstream
		<?php
		include_once('includes/header.php');
		?>
		<div class="mc-bottom">
			<?php
			include_once('<includes/menu.php');
			?>

=======
		<?php include_once('includes/header.php'); ?>
		<div class="mc-bottom">
			<?php include_once('includes/menu.php'); ?>
>>>>>>> Stashed changes
			<section class="main-content">
				<div class="main-content-inside">
					<?php
					$page_default = 'inicial';
					$page = $page_default;
					if (!empty($_GET['page'])) {
						$page = $_GET['page'];
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
					}
					$page_url = 'pages/' . $page . '.php';
					if (file_exists($page_url)) {
						include_once($page_url);
<<<<<<< Updated upstream

					} else{
						include_once('pages/' . $page_default . '.php');
					}
					?>

=======
					}else{
						include_once('pages/' . $page_default . '.php');
					}
					?>
>>>>>>> Stashed changes
				</div>
			</section>
		</div>
	</div>

</body>

</html>