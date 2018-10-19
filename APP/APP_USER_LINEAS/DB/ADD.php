<?php
include('../../../MASTER/include/verifyAPP.php');
?>
<div class="portlet light bordered col-md-8 col-md-offset-2">
    <div class="portlet-title">
        <div class="caption blue">
            <i class="icon-settings font-blue-sharp"></i>
            <span class="caption-subject bold font-blue-sharp uppercase">
                Nueva L&iacute;nea
            </span>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" id="formAdd">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Cod. L&iacute;nea</label>
                    <div class="col-md-6">
                        <input name="cod_linea" id="cod_linea" type="text" maxlength="50" class="form-control"></div>
                    <div class="col-md-3">
                        <div id="msgCodLinea">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">L&iacute;nea</label>
                    <div class="col-md-6">
                        <input name="linea" id="linea" type="text" maxlength="50" class="form-control"></div>
                    <div class="col-md-3">
                        <div id="msgLinea">&nbsp;</div>
                    </div>
                </div>
                <div class="form-group">
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
                                ?>
                                <option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
                                <?php
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
                data: 'cod=' + $('#cod_linea').val()+'&sucursal='+$('#sucursal').val(),
                success: function (data) {
                    console.log(data)
                    if (data == 1) {
                        $('#msgCodLinea').fadeIn(1000).html("<span style='color:#FF0000;'>Cod. L&iacute;nea existente en sucursal</span>");
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