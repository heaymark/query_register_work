<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Template</title>
	<link rel="stylesheet" href="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/themes/css/cartodb.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap-theme.min.css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/<?= $view ?>/view.css">
</head>
<body>
	<input type="hidden" name="baseUrl" id="baseUrl" value="<?php echo base_url();?>">
	<?php  $this->load->view("layout/header"); ?>
	<?php  $this->load->view($view); ?>
	<?php  $this->load->view("layout/footer"); ?>
	<script type="text/javascript" src="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/cartodb.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fileDownload/1.4.2/jquery.fileDownload.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highcharts.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highcharts-more.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highcharts-3d.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/js/modules/exporting.js"></script>
	<script type="text/javascript" src="scripts/global.js"></script>
	<script type="text/javascript" src="scripts/cdmxCarto.js"></script>
	<script type="text/javascript" src="scripts/graphics.js"></script>
	<script type="text/javascript" src="scripts/<?= $view ?>/global.js"></script>
	<script type="text/javascript" src="scripts/<?= $view ?>/functions.js"></script>
	<script type="text/javascript" src="scripts/<?= $view ?>/events.js"></script>
</body>
</html>
