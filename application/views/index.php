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
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/<?= $view ?>/view.css">
	<script type="template/html" id="infraestructura">
		<form id="form_info" name="form_info">
			<div class="row ">
				<dl class="form-group col-xs-12">
					<dt>Formato</dt>
					<dd><%- item.DESCRIPCION_SUBPROCESO %></dd>
				</dl>
			</div>
			<div class="row">
				<dl class="form-group col-xs-12">
					<dt>Cuenta Predial</dt>
					<dd><%- item.CUENTAPREDIO %></dd>
				</dl>
			</div>
			<div class="row">
				<dl class="form-group col-xs-6">
					<dt>Calle</dt>
					<dd><%- item.CALLE %></dd>
				</dl>
				<dl class="form-group col-xs-6">
					<dt>Número Exterior</dt>
					<dd><%- item.NUMEROEXTERNO %></dd>
				</dl>				
			</div>
			<div class="row">
				<dl class="form-group col-xs-6">
					<dt>Número Interior</dt>
					<dd><%- item.NUMEROINTERNO %></dd>
				</dl>
				<dl class="form-group col-xs-6">
					<dt>Colonia</dt>
					<dd><%- item.COLONIA %></dd>
				</dl>
			</div>
			<div class="row">
				<dl class="form-group col-xs-6">
					<dt>Delegacion</dt>
					<dd><%- item.DELEGACION %></dd>
				</dl>
				<dl class="form-group col-xs-6">
					<dt>Codigo Postal</dt>
					<dd><%- item.CODIGOPOSTAL %></dd>
				</dl>
			</div>
			<div class="row">
				<dl class="form-group col-xs-6">
					<dt>Superficie</dt>
					<dd><%- item.SUPERFICIE%></dd>
				</dl>
				<dl class="form-group col-xs-6">
					<dt>Folio</dt>
					<dd><%- item.FOLIO%></dd>
				</dl>
			</div>
			<div class="row">
				<dl class="form-group col-xs-12">
					<dt>Descargar Formato</dt>
					<dd id="reportepdf">
						<a class="dowload_report btn btn-primary" data-id="<%- item.IDPROCESO %>" target="_blank" href="<?php echo base_url('reporte/index?idproceso_=')?><%- item.IDPROCESO %>"> 
							<span class="glyphicon glyphicon-file"></span> 
						</a>
					</dd>
				</dl>
			</div>
		</form>
	</script>
</head>
<body>
	<input type="hidden" name="baseUrl" id="baseUrl" value="<?php echo base_url();?>">
	<?php  $this->load->view("layout/header"); ?>
	<?php  $this->load->view($view); ?>
	<?php  $this->load->view("layout/footer"); ?>
	<script src="scripts/route.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2cjxQ5RpEyBg0BUAGiUKX3Lm5T2_0ySQ&libraries=places&callback=mapInit"></script>
	<script type="text/javascript" src="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/cartodb.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fileDownload/1.4.2/jquery.fileDownload.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/leaflet.draw.css" />
	<script type="text/javascript" src="scripts/leaflet/leaflet.draw-src.js"></script>
	<script type="text/javascript" src="scripts/leaflet/leaflet.draw.js"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/js/highstock.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highstock.src.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highcharts.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highcharts-more.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.7/highcharts-3d.js"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.1.1/es-modules/masters/highstock.src.js"></script> -->
	<!-- <script src="https://code.highcharts.com/stock/highstock.js"></script> -->
	<!-- <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script> -->
	<script type="text/javascript" src="scripts/global.js"></script>
	<script type="text/javascript" src="scripts/cdmxCarto.js"></script>
	<script type="text/javascript" src="scripts/graphics.js"></script>
	<script type="text/javascript" src="scripts/google.js"></script>
	<script type="text/javascript" src="scripts/route.js"></script>
	<script type="text/javascript" src="scripts/<?= $view ?>/global.js"></script>
	<script type="text/javascript" src="scripts/<?= $view ?>/functions.js"></script>
	<script type="text/javascript" src="scripts/<?= $view ?>/events.js"></script>
	<!-- <script type="text/javascript" src="https://www.highcharts.com/samples/data/usdeur.js"></script> -->
</body>
</html>
