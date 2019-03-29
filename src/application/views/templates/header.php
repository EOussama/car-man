<!DOCTYPE html>

<html lang="en">
    <head>

        <!-- The meta data. -->
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Rachid">
        <meta name="application-name" content="CarSave">
        <meta name="description" content="Saving cars to the database.">
        <meta name="keywords" content="php, cars">
        
        <!-- Semantic UI. -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/lib/bootstrap/bootstrap.min.css">
        
        <!-- The main stylesheet. -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/main.css">

        <!-- The website's favicon. -->
        <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">

        <!-- The website's title -->
        <title>Car-Man</title>
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>">Car-Man</a>

			<ul class="nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle trnsjs" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo lang('LANGUAGES_LABEL'); ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= site_url()?>ar"><?php echo lang('LANGUAGES_LABEL_ARABIC'); ?></a>
						<a class="dropdown-item" href="<?= site_url()?>es"><?php echo lang('LANGUAGES_LABEL_SPANISH'); ?></a>
				</li>
			</ul>
		</div>
	</nav>

    <main class="container">