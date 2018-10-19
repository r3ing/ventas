'use strict'

$(function(){
    showTable();
});

function showTable(){
    $('#loading').show();
    //$('#result').hide();
    $('#result').html('');
    $.ajax({
        type: 'GET',
        url: 'VIEW/LIST.php',
        success: function(data) {
            $('#result').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#result').show();
            $('#options').show();

        }
    })
}

function showForms(url, op, params){
    $('#options').hide();
    $('#result').html('');
    $('#loading').show();
    if(op == 1){
        var data = '';
    }else{
        var data = 'cod='+params;
    }
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(data) {
            $('#result').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    })
}

function _edit(cod){
    $('#result').hide();
    $('#loading').show();
    $.ajax({
        type: 'POST',
        url: 'DB/EDIT.php',
        data: 'cod='+cod,
        success: function(data) {
            $('#result').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    })
}

function _delete(cod){
    var si = confirm('Realmente desea eliminar esta L\u00EDnea?')
    if (si)    {
        $('#result').hide();
        $('#loading').show();
        $.ajax({
            type: 'POST',
            url: 'DB/DELETE_DB.php',
            data: 'cod='+cod,
            success: function(data) {
                $('#result').html(data);
            },
            complete: function(){
                $('#loading').hide();
                $('#result').show();
            }
        })
    }
}

function _cancel(){
    //showTable();
    location.reload();
}

function validateFrm(){
    var form = true;

    if (document.getElementById('cod_linea').value == '')
    {
        $('#msgCodLinea').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Cod. L&iacute;nea.</span>");
        form = false;
    }
    else{
        if(1!=1){
        // if(!validaCodSucursal(document.getElementById('cod_sucursal').value)){
            $('#msgCodLinea').fadeIn(1000).html("<span style='color:#FF0000;'>Cod. L&iacute; Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgCodLinea').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('linea').value == '')
    {
        $('#msgLinea').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese L&iacute;nea.</span>");
        form = false;
    }
    else{
        if(!validaAlfanumerico(document.getElementById('linea').value)){
            $('#msgLinea').fadeIn(1000).html("<span style='color:#FF0000;'>L&iacute; Inv&aacute;lida.</span>");
            form = false;
        }
        else{
            $('#msgLinea').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('sucursal').value == 0)
    {
        $('#msgSucursal').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Sucursal.</span>");
        form = false
    }
    else
        $('#msgSucursal').fadeIn(1000).html("&nbsp;");

    return form;
}






