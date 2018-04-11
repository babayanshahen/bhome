<!DOCTYPE html>
<html class="full-height">
	<head>
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>BESTHOME</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="<?php  echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php  echo base_url('assets/css/mdb.min.css')?>" rel="stylesheet">
		<link href="<?php  echo base_url('assets/css/style.css')?>" rel="stylesheet">
		<script type="text/javascript" src="<?php  echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
	</head>
	<body>
		<script>
			baseUrl = "<?php echo base_url();?>";
		</script>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
				<div class="container">
					<!-- navbar -->
					<a class="navbar-brand" href="<?php echo base_url()?>">
						<img src="<?php echo base_url('assets/img/logo.png') ?>" class="img-fluid pos-a" width="32">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent-7">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url()?>">HOME
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<?php if (isUserLoggedIn()): ?>
								<!-- <li class="nav-item">
									<a class="nav-link" href="<?php echo  base_url('dashboard/logout')?>">LOG OUT</a>
								</li> -->
								<li class="nav-item">
									<a class="nav-link" href="<?php echo  base_url('dashboard')?>">Իմ Էջ</a>
								</li>
							<?php else: ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('register')?>">REGISTRATION</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm">LOG IN</a>
								</li>
							<?php endif ?>
						</ul>
						<form action="<?php echo base_url('statements/searching')?>" method="POST">
							<div class="md-form mt-0">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" />
							</div>
						</form>
					</div>
				</div>
			</nav>