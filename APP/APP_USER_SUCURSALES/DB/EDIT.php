<?php
include('../../../MASTER/include/verifyAPP.php');

if(isset($_POST['cod'])) {

    $cod = $_POST['cod'];

    include('../../../MASTER/config/conect.php');
    $sql="SELECT * FROM sucursales WHERE cod_sucursal = ".$cod;
    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $consulta = $link->prepare($sql);
    $consulta->execute();
    while ($row = $consulta->fetch())
    {
        $cod				=	$row[0];
        $sucursal			= 	$row[1];
    }
}
?>
<div class="portlet light bordered col-md-8 col-md-offset-2">
    <div class="portlet-title">
        <div class="caption blue">
            <i class="icon-settings font-blue-sharp"></i>
            <span class="caption-subject bold font-blue-sharp uppercase">
                Editar Sucursal
            </span>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" id="formEdit">
            <div class="form-body">
                <input type="hidden" id="_cod" name="_cod" value="<?php echo $cod; ?>">
                <div class="form-group">
                    <label class="col-md-3 control-label">Cod. Sucursal</label>
                    <div class="col-md-6"><input name="cod_sucursal" id="cod_sucursal" type="text" maxlength="50" class="form-control" value="<?php echo $cod; ?>"></div>
                    <div class="col-md-3">
                        <div id="msgCodSucursal">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Sucursal</label>
                    <div class="col-md-6"><input name="sucursal" id="sucursal" type="text" maxlength="50" class="form-control" value="<?php echo $sucursal; ?>"></div>
                    <div class="col-md-3">
                        <div id="msgSucursal">&nbsp;</div>
                    </div>
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