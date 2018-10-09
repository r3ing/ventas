<?php
include('../../MASTER/include/verifyAPP.php');

$ID_US	= $vari[0];

$name_application 	= $_GET['name_application'];
$tipo 				= $_GET['tipo'];
$descripcion        = $_GET['descripcion'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php
    include ("../HEAD.php");
    ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="width:98%; background: white !important;">
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <h3 class="page-title">
            <?php
            if(trim($tipo) == 'ADM')	echo 'MANTENEDOR - ';
            else 				echo '';

            if ($descripcion != '')	echo $descripcion;
            else 							echo '';
            ?>
            <small>...</small>
        </h3>
        <!-- *********************************************** BEGIN CONTENIDO *********************************************** -->
        </br>
        <div id="result" hidden>
        </div>
        <div id="loading" hidden  width="100%" align="center">
            </br></br></br>
            <img src="../../MASTER/images/loaders/loader10.gif" width="3%" class="img-responsive center-block">
            <h3> Cargando Informaci&oacute;n ... </h3>
        </div>

        <!-- *********************************************** END   CONTENIDO *********************************************** -->
    </div>
</div>

<?php
include ("../FOOTER.php");
?>
<script language="javascript" src="../TEMPLATES/JS/UtilsAjax.js"></script>
<script language="javascript" src="../../MASTER/js/validations.js"></script>
<script language="javascript" src="app_user_lineas.js"></script>

</body>
</html>