<?php
include '../DAO/MetodosDAO.php';

$cod=$_REQUEST['cod'];

$objMetodos=new MetodosDAO();
$lista=$objMetodos->ListarProductosCod($cod);

$nombre=$lista[1];
$precio=$lista[2];
$detalle=$lista[5];
?>

<form action="../DAO/CarritoDAO.php">
<table border="0">
    <tr>
        <th rowspan="4"><img src="../Imagenes/<?php echo $nombre; ?>.jpg" width="200" height="170"></th>
        <th><?php echo $nombre; ?></th>
    </tr><tr>
        <td align="justify"><?php echo $detalle; ?></td>
    </tr><tr>
        <th align="right">S/. <?php echo $precio; ?></td>
    </tr><tr>
        <td align="right">Ingrese Cantidad: <input type="number" min="1" max="100" value="1" name="txtCan"></td>
    </tr><tr>
        <th colspan="2" align="right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="submit(event)">Agregar a Carrito</button>
        </th>
    </tr>
</table>
    <input type="hidden" name="id" value="<?php echo $cod; ?>">
    <input type="hidden" name="accion" value="agregar">
    <input type="hidden" name="op" value="2">
</form>
