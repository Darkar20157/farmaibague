<?php
require_once "Conexiones.php";
date_default_timezone_set("America/Mexico_City");

if(isset($_POST['voucher'])){
    $codVoucher = $_POST['voucher'];
    $sql = "SELECT 
    * 
    FROM SALES S
    LEFT JOIN DETAIL_ART DP ON S.BARCODE = DP.BARCODE
    WHERE NRO_FACTURA = '$codVoucher'";
    $consult = mysqli_query($conexion, $sql);
    while($row = mysqli_fetch_assoc($consult)){
        ?>
            <tr>
                <td><?php echo $row['NRO_FACTURA'] ?></td>
                <td><?php echo $row['BARCODE'] ?></td>
                <td><?php echo $row['NAME_PRODUCT'] ?></td>
                <td><?php echo $row['AMOUNT'] ?></td>
                <td><?php echo $row['PRICE_UNID'] ?></td>
                <td><?php echo $row['PACKAGING'] ?></td>
                <td>
                    <?php
                    if($row['STATE'] == false){
                        ?>
                        <span class="badge bg-success">Vendido</span>
                        <?php
                    }else{
                        ?>
                        <span class="badge bg-danger">Devuelto</span>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($row['STATE'] == false){
                        ?>
                        <button class="btn btn-success" onclick="devolutionAccept('<?php echo $row['NRO_FACTURA'] ?>' , 
                                                                            <?php echo $row['BARCODE'] ?>)"><img src="https://img.icons8.com/sf-black/24/null/checkmark.png"/></button>
                        <?php
                    }else{
                        ?>
                        
                        <?php
                    }
                    ?>                                                                            
                </td>
            </tr>
        <?php
    }
}elseif(isset($_POST['nroDevolution'])){

    $nroDevolution = $_POST['nroDevolution'];
    $barcode = $_POST['barcode'];
    $description = $_POST['description'];

    $sql = "SELECT * FROM SALES WHERE NRO_FACTURA = '$nroDevolution' AND BARCODE = '$barcode'";
    $consult = mysqli_query($conexion, $sql);
    $date = date('Y-m-d');
    if($consult){
        $row = mysqli_fetch_assoc($consult);
        $pre = $row['PACKAGING'];
        $bar = $row['BARCODE'];
        $cant = $row['AMOUNT'];

        $sql = "SELECT AMOUNT FROM INVENTARIO WHERE BARCODE = $bar AND PACKAGING = '$pre'";
        $consult1 = mysqli_query($conexion, $sql);
        $row2 = mysqli_fetch_assoc($consult1);

        $cantA = $row2['AMOUNT'];
        $total = $cantA + $cant;

        $sql = "UPDATE INVENTARIO SET AMOUNT = $total WHERE BARCODE = $bar AND PACKAGING = '$pre'";
        $consult2 = mysqli_query($conexion, $sql);

        if($consult2){

            $sql = "UPDATE SALES SET STATE = TRUE WHERE NRO_FACTURA = '$nroDevolution' AND BARCODE = '$barcode'";
            $consult3 = mysqli_query($conexion, $sql);

            if($consult3){
                
                $sql = "INSERT INTO DEVOLUTIONS(NRO_VOUCHER, BARCODE, PACKAGING, DATE, DESCRIPTION) VALUES('$nroDevolution', $bar, '$pre', '$date', '$description')";
                $consult4 = mysqli_query($conexion, $sql);

                if($consult4){
                    echo "Correcto";
                }
            }
        }
    }
}
?>