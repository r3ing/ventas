<?php
include('../../../MASTER/include/verifyAPP.php');
?>
<div class="portlet light bordered">
    <div class="portlet-body">
        <?php
        if (isset($_POST['cod_linea'])) {
            $cod = $_POST['cod_linea'];
            $linea = $_POST['linea'];

            include('../../../MASTER/config/conect.php');

            if ($_POST['cod_sucursal'] != $_POST['_cod']) {

                $sql = "SELECT COUNT(cod_sucursal) from lineas where cod_sucursal = " . $cod;
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result = $link->prepare($sql);
                $result->execute();
                $val = $result->fetchColumn(0);

                if($val){
                    echo '<div class="note note-danger">';
                    echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
                    echo '<p>';
                    echo 'El registro no ha podido ser modificado.';
                    echo '</p>';
                    echo '</div>';
                    echo "<a href=\"#\" onclick=\"_cancel()\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
                    exit();
                }
            }else {
                $sql = "UPDATE sucursales SET cod_sucursal  = '" . trim($cod) . "',
											   	 sucursal = '" . $sucursal . "'";
                $sql = $sql . " WHERE cod_sucursal = " . $cod;

                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = $link->prepare($sql);
                $consulta->execute();

                echo '<div class="note note-success">';
                echo '<h4 class="block">Datos modificados con &eacute;xito!</h4>';
                echo '<p>';
                echo 'Registro modificado exitosamente.';
                echo '</p>';
                echo '</div>';

                echo "<a href=\"#\" onclick=\"_cancel()\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
            }
        } else {
            echo '<div class="note note-danger">';
            echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
            echo '<p>';
            echo 'El registro no ha podido ser modificado.';
            echo '</p>';
            echo '</div>';
            echo "<a href=\"#\" onclick=\"_cancel()\" class=\"btn default\">
							<span>Volver</span>
						  </a>";
            exit();
        }
        ?>
    </div>
</div> 