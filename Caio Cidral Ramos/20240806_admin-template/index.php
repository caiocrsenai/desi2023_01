<<<<<<< HEAD
<div class="initial-container-top">
						<div class="ict-left">
							<div class="ict-line-container">
								<div class="container-box">
									<div class="cb-title">Titulo</div>
									<div class="lc-cb-infos">
										<div class="value-big">R$2500</div>
										<div class="value-small">-11.4%</div>
									</div>
									<div class="cb-text">Texto</div>
								</div>
							</div>
						</div>
						<div class="ict-right">
							123
						</div>
					</div>
					<div class="initial-container-bottom">
						<div class="ict-line-container">
							<div class="container-box flex-1">
								<div class="cb-header">
									<div class="cb-title">Vendas</div>
								</div>
								<div class="cb-body">
									<div class="table-container">
										<table>
											<thead>
												<tr>
													<th>Cliente</th>
													<th>Data</th>
													<th>Valor</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="tbl-info-circle-ct">
															<span class="circle"
																style="background-color: #04d182;">CB</span>
															Clayton Bates
														</div>
													</td>
													<td>01 Agosto 2024</td>
													<td>R$200,50</td>
													<td>
														<div class="tbl-status color-green">Aprovado</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="tbl-info-circle-ct">
															<span class="circle"
																style="background-color: #fa8c16;">GB</span>
															Gabriel Frazier
														</div>
													</td>
													<td>05 Agosto 2024</td>
													<td>R$120</td>
													<td>
														<div class="tbl-status color-blue">Pendente</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="tbl-info-circle-ct">
															<span class="circle"
																style="background-color: #1890ff;">DH</span>
															Debra Hamilton
														</div>
													</td>
													<td>10 Agosto 2024</td>
													<td>R$35,75</td>
													<td>
														<div class="tbl-status color-red">Reprovado</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="tbl-info-circle-ct">
															<span class="circle"
																style="background-color: #1890ff;">SW</span>
															Stacey Ward
														</div>
													</td>
													<td>12 Agosto 2024</td>
													<td>R$126,35</td>
													<td>
														<div class="tbl-status color-yellow">Em análise</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br><br>
					<div class="container-box cb-form-max-width align-center flex-1">
						<div class="cb-header">
							<div class="cb-title">Formulário</div>
						</div>
						<div class="cb-body">
							<form>
								<label>
									<div class="lbl">Nome</div>
									<input type="text">
								</label>

								<label>
									<div class="lbl">Data</div>
									<input type="date">
								</label>

								<label>
									<div class="lbl">Status</div>
									<select>
										<option disabled selected style="display: none;">Selecione</option>
										<option value="1">Aprovado</option>
										<option value="2">Pendente</option>
										<option value="3">Reprovado</option>
										<option value="4">Em análise</option>
									</select>
								</label>
							</form>
						</div>
					</div>
=======
<?php
include_once('includes/connect.php');
?>
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
>>>>>>> main
