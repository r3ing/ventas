<?php
include('../../../MASTER/include/verifyAPP.php');  
?>
<div class="portlet light bordered">
	<div class="portlet-body">	
		<?php  
			if(isset($_POST['cod_sucursal']))
			{   
				$cod	 			=	 $_POST['cod_sucursal'];
				$sucursal 			=	 $_POST['sucursal'];

				include('../../../MASTER/config/conect.php');
				$sql =  "INSERT INTO sucursales(cod_sucursal,sucursal)";
				$sql = $sql."VALUES ('".trim($cod)."', '".trim($sucursal)."')";
				$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
				$consulta = $link->prepare($sql); 
				$consulta->execute();
				
				echo '<div class="note note-success">';
					echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
					echo '<p>';
						 echo 'Registro ingresado exitosamente.';
					echo '</p>';
				echo '</div>'; 
				
				echo "<a onclick=\"_cancel()\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
			}
			else
			{
				echo '<div class="note note-danger">';
					echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
					echo '<p>';
						echo 'El registro no ha podido ser ingresado.';
					echo '</p>';
				echo '</div>';
				echo "<a onclick=\"_cancel()\" class=\"btn default\">
						<span>Volver</span>
					  </a>";
				exit();
			}
		?> 
	</div>
</div> 