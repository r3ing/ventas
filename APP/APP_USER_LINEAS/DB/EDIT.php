<?php
include('../../../MASTER/include/verifyAPP.php');

if(isset($_POST['cod'])) {

    $cod = $_POST['cod'];

    include('../../../MASTER/config/conect.php');
    $sql="SELECT * FROM lineas WHERE cod_linea = ".$cod;
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $consulta = $link->prepare($sql);
    $consulta->execute();
    while ($row = $consulta->fetch())
    {
        $cod				=	$row[0];
        $linea			    = 	$row[1];
        $sucursal			= 	$row[2];
    }
}
?>
<div class="portlet light bordered col-md-8 col-md-offset-2">
    <div class="portlet-title">
        <div class="caption blue">
            <i class="icon-settings font-blue-sharp"></i>
            <span class="caption-subject bold font-blue-sharp uppercase">
                Editar L&iacute;nea
            </span>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" id="formEdit">
            <div class="form-body">
                <input type="hidden" id="_cod" name="_cod" value="<?php echo $cod; ?>">
                <div class="form-group">
                    <label class="col-md-3 control-label">Cod. L&iacute;nea</label>
                    <div class="col-md-6">
                        <input name="cod_linea" id="cod_linea" type="text" maxlength="50" class="form-control" value="<?php echo $cod ?>"></div>
                    <div class="col-md-3">
                        <div id="msgCodLinea">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">L&iacute;nea</label>
                    <div class="col-md-6">
                        <input name="linea" id="linea" type="text" maxlength="50" class="form-control" value="<?php echo $linea ?>"></div>
                    <div class="col-md-3">
                        <div id="msgLinea">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group" id="selectSucursal">
                    <label class="col-md-3 control-label">Sucursal</label>
                    <div class="col-md-6">
                        <select name="sucursal" id="sucursal" class="form-control" required>
                            <option value="0">Seleccione Sucursal</option>
                            <?php
                            include('../../../MASTER/config/conect.php');
                            $sql="SELECT * FROM sucursales";
                            $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                            $result = $link->prepare($sql);
                            $result->execute();
                            while ($row = $result->fetch()) {
                                if($row[0] == $sucursal){
                                    echo "<option selected value='".$row[0]."'>".utf8_encode($row[1])."</option>";
                                }
                                else{
                                    echo "<option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3"><div id="msgSucursal">&nbsp;</div></div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="" onclick="_cancel()" class="btn btn-default"><span>Volver</span></a>
                        <input type="submit" name="Guardar" id="Guardar" value="Editar Sucursal"
                               class='btn btn-primary' style="width:auto;"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $('#formEdit').on('submit', function(e){
        e.preventDefault();
        if(validateFrm()) {
            $('#result').hide();
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: 'DB/EDIT_DB.php',
                data: $(this).serialize(),
                success: function (data) {
                    $('#result').html(data);
                },
                complete: function () {
                    $('#loading').hide();
                    $('#result').fadeIn('slow');
                }
            });
        }
    });



</script>