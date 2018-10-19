<table class="table table-bordered table-hover" id="sample_1">
    <thead>
    <tr>
        <th> Cod. Sucursal</th>
        <th> Sucursal </th>
        <th class="notReport"></th>
        <th class="notReport"></th>
    </tr>
    </thead>
    <tbody>
    <?php

    include('../../MASTER/config/conect.php');

    $sql = "SELECT * FROM sucursales";

    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $result = $link->prepare($sql);
    $result->execute();
    while ($row = $result->fetch()) {
        echo "<tr class='odd gradeX'>";
        echo "<td>" . $row[0] . "</td>
                      <td>" . $row[1] . "</td>";
        echo "<td align ='center'>
                <a href='#' class='link' onclick=\"_edit(" . $row[0] . ")\">
                    <i class='fa fa-pencil' style='color:#0066FF;'></i>
                </a>
              </td>";
        echo "<td align ='center'>
                <a href='#' class='link' onclick=\"_delete(" . $row[0] . ")\">
                    <i class='fa fa-times' style='color:#FF0000;'></i>
                </a>
              </td>";
        echo "</tr>";

        //echo "onclick=\"delete(" . $row[0] . ")\""
    }
    ?>
    </tbody>
</table>