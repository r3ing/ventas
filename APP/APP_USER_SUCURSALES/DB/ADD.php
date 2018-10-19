<?php
include('../../../MASTER/include/verifyAPP.php');
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
        <form class="form-horizontal" role="form" id="formAdd">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Cod. Sucursal</label>
                    <div class="col-md-6">
                        <input name="cod_sucursal" id="cod_sucursal" type="text" maxlength="50" class="form-control"></div>
                    <div class="col-md-3">
                        <div id="msgCodSucursal">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Sucursal</label>
                    <div class="col-md-6">
                        <input name="sucursal" id="sucursal" type="text" maxlength="50" class="form-control"></div>
                    <div class="col-md-3">
                        <div id="msgSucursal">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="" onclick="_cancel()" class="btn btn-default"><span>Volver</span></a>
                        <input type="submit" name="Guardar" id="Guardar" value="Agregar Sucursal"
                               class='btn btn-primary' style="width:auto;"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $("#formAdd").on('submit', function (e) {
        e.preventDefault();
        if (validateFrm(1)) {
            //verify
            $.ajax({
                type: 'POST',
                url: 'DB/VERIFY.php',
                data: 'cod=' + $('#cod_sucursal').val(),
                success: function (data) {
                    if (data == 1) {
                        $('#msgCodSucursal').fadeIn(1000).html("<span style='color:#FF0000;'>Cod. Sucursal existente.</span>");
                    }
                    else {
                        save();
                    }
                }
            });
        }
    });

    function save() {
        $('#result').hide();
        $('#loading').show();
        $.ajax({
            type: 'POST',
            url: 'DB/ADD_DB.php',
            data: $("#formAdd").serialize(),
            success: function (data) {
                $('#result').html(data);
            },
            complete: function () {
                $('#loading').hide();
                $('#result').fadeIn('slow');
            }
        });
    }

</script>