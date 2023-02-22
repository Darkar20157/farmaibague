<?php
require_once "Conexiones.php";

//Ingresamos datos a la tabla aux para simular un carrito

if(isset($_POST['cod'])){
    $cod = $_POST['cod'];
    $nom = $_POST['nom'];
    $gram = $_POST['gram'];
    $cant = $_POST['cant'];
    $precio = $_POST['pre'];
    $discount = $_POST['dis'];
    $embalaje = $_POST['emb'];
    
    $sql = "SELECT AMOUNT FROM INVENTARIO WHERE BARCODE = $cod AND PACKAGING = '$embalaje'";
    $consult = mysqli_query($conexion, $sql);
    if($consult){
        $row = mysqli_fetch_assoc($consult);
        if($row['AMOUNT'] < $cant){
            die("no hay");
        }
    }
    $sql = "INSERT INTO DETAIL_PRODUCT(BARCODE, NAME_PRODUCT, AMOUNT, GRAMMAGE_MINIMETERAGE, PRICE, DISCOUNT_ID, PACKAGING) 
    VALUES($cod, '$nom', $cant, '$gram', $precio, $discount, '$embalaje')";
    $result = mysqli_query($conexion, $sql);
    if($result){
        $sql2 = "SELECT * FROM DETAIL_PRODUCT";
        $consult2 = mysqli_query($conexion,$sql2);
        // Mostramos la tabla aux y le colocamos un identificador para eliminar si asi se desea

        while($row2 = mysqli_fetch_assoc($consult2)){
            ?>
            <tr>
                <td><?php echo $row2['BARCODE']; ?></td>
                <td><?php echo $row2['NAME_PRODUCT']; ?></td>
                <td><?php echo $row2['GRAMMAGE_MINIMETERAGE']; ?></td>
                <td><?php echo $row2['AMOUNT']; ?></td>
                <td><?php echo $row2['PACKAGING']; ?></td>
                <td><?php echo $row2['PRICE']; ?></td>
                <td><?php echo $row2['DISCOUNT_ID']; ?></td>
                <td><button class="btn btn-outline-danger" id="<?php echo $row2['BARCODE'] ?>" onclick="eliminarUnidad(<?php echo $row2['BARCODE'] ?>, '<?php echo $row2['PACKAGING'] ?>')">X</button></td>
            </tr>
            <?php
        }
    }else{
        echo "Incorrecto";
    }
    //Eliminamos todo de la tabla detalle
}elseif(isset($_POST['borrar'])){
    $cedula = $_POST['borrar'];
    $sql = "DELETE FROM DETAIL_PRODUCT";
    $consult = mysqli_query($conexion, $sql);
    if($consult){
        echo "Se ha borrado";
    }
    //Eliminamos una sola unidad de la tabla detalle
}elseif(isset($_POST['borrarUnidad'])){
    $cod = $_POST['borrarUnidad'];
    $embalaje = $_POST['embalaje'];
    $sql = "DELETE FROM DETAIL_PRODUCT WHERE BARCODE = $cod AND PACKAGING = '$embalaje'";
    $consult = mysqli_query($conexion, $sql);
    $sql2 = "SELECT * FROM DETAIL_PRODUCT";
    $consult2 = mysqli_query($conexion, $sql2);
    while($row2 = mysqli_fetch_assoc($consult2)){
        ?>
        <tr>
            <td><?php echo $row2['BARCODE']; ?></td>
            <td><?php echo $row2['NAME_PRODUCT']; ?></td>
            <td><?php echo $row2['GRAMMAGE_MINIMETERAGE']; ?></td>
            <td><?php echo $row2['AMOUNT']; ?></td>
            <td><?php echo $row2['PACKAGING']; ?></td>
            <td><?php echo $row2['PRICE']; ?></td>
            <td><?php echo $row2['DISCOUNT_ID']; ?></td>
            <td><button class="btn btn-outline-danger" id="<?php echo $row2['BARCODE'] ?>" onclick="eliminarUnidad(<?php echo $row2['BARCODE'] ?>, '<?php echo $row2['PACKAGING'] ?>')">X</button></td>
        </tr>
    <?php
    }
}
?>

