<?php
if (isset($_POST['cod'])) {
    $cod = $_POST['cod'];
    $sucursal = $_POST['sucursal'];

    include('../../../MASTER/config/conect.php');
    $sql = "SELECT COUNT(cod_linea) from lineas where cod_linea = " . $cod ." AND sucursal=".$sucursal;
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $link->prepare($sql);
    $result->execute();

    $val = $result->fetchColumn(0);

    if ($val)
        echo 1;
    else
        echo 0;
} else {
    exit();
}
?>