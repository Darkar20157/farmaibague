<?php
require_once "Conexiones.php";
$date = $_POST['date'];
$sql = "SELECT 
SL.DATE_VOUCHER,
SL.BARCODE,
(SELECT NAME_PRODUCT FROM INVENTARIO INV WHERE BARCODE = SL.BARCODE AND PACKAGING = SL.PACKAGING) AS NAME_PRODUCT,
SL.PACKAGING,
COUNT(SL.BARCODE) AS AMOUNT,
SUM(SL.TOTAL_REGISTER) AS TOTAL,
SUM(SL.PRICE_BUY) AS PRICE_BUY,
SUM(CA.PRICE) AS PRICE
FROM SALES SL
LEFT JOIN COST_ADDITIONAL CA ON CA.ID = SL.COST_ADDITIONAL_ID
WHERE DATE_FORMAT(SL.DATE_VOUCHER, '%Y-%m-%d') = '$date'
AND STATE = FALSE
GROUP BY SL.BARCODE, SL.PACKAGING";
$consulta = mysqli_query($conexion, $sql);
?>
    <?php
    while($row = mysqli_fetch_assoc($consulta)){
        ?>
        <tr>
            <td><?php echo $row['DATE_VOUCHER']; ?></td>
            <td><?php echo $row['BARCODE']; ?></td>
            <td><?php echo $row['NAME_PRODUCT']; ?></td>
            <td><?php echo $row['PACKAGING']; ?></td>
            <td><?php echo $row['AMOUNT']; ?></td>
            <td><?php echo $row['TOTAL']; ?></td>
            <td><?php echo $row['PRICE_BUY']; ?></td>
            <td><?php echo $row['TOTAL'] - $row['PRICE_BUY']; ?></td>
            <td><?php echo $row['PRICE']; ?></td>
        </tr>
    <?php
    }
?>