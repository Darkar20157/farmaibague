<?php
require "Conexiones.php";
date_default_timezone_set('America/Bogota');
if(isset($_POST['ced'])){
    try {
        $ced = $_POST['ced'];
        $names = $_POST['names'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $date = date("Y-m-d H:i:s");
        $state = true;
        $sql = "SELECT CED_NRO, PHONE FROM CLIENTS WHERE CED_NRO = '$ced'";
        $consult = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($consult);
        if(empty($row)){
            $sql = "INSERT INTO CLIENTS(CED_NRO, NAMES, EMAIL, ADDRES, PHONE, DATE_CREATION, STATES, GENDER) 
            VALUES($ced, '$names', '$email', '$address', $phone, '$date', $state, '$gender')";
            $consult = mysqli_query($conexion, $sql);
            echo 'Correcto';
        }
        if(!empty($row)){
            if($row['CED_NRO'] == $ced){
                die('Cedula');
            }
            if($row['PHONE'] == $phone){
                die('Celular');
            }
        }
    } catch (Exception $ex) {
        echo "Error: "+$ex;
    }    
}elseif(isset($_POST['type'])){
    $type = $_POST['type'];
    $id = $_POST['id'];
    try{
        $sql = "SELECT * FROM CLIENTS WHERE $type = $id";
        $consult = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($consult);
        echo json_encode($row);
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['cedSale'])){
    try{
        $array = [];
        $array2 = [];
        $i = 0;
        $items = 1;
        $total_voucher = 0;
        $cedsale = $_POST['cedSale'];
        $pago = $_POST['pago'];
        $costAdi = $_POST['costAdi'];
        $methodPay = $_POST['methodPay'];
        $date = date("Y-m-d H:i:s");
        $sql = "SELECT MAX(ID) AS ID FROM SALES";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            $id = mysqli_fetch_assoc($consult);
            $id = "JVS"."-".$id['ID']+1;
            //Total del voucher
            $sql2 = "SELECT PRICE, AMOUNT, DS.DISCOUNT_PRICE FROM DETAIL_PRODUCT DP INNER JOIN DISCOUNTS DS ON DP.DISCOUNT_ID = DS.ID";
            $consult2 = mysqli_query($conexion, $sql2);
            while($row4 = mysqli_fetch_assoc($consult2)){
                $subtotal = $row4['PRICE'] * $row4['AMOUNT'];
                $descuento = ($subtotal * $row4['DISCOUNT_PRICE']) / 100;
                $total = $subtotal - $descuento;
                array_push($array2, $total);
            }
            $sql = "SELECT * FROM COST_ADDITIONAL WHERE ID = '$costAdi'";
            $consult = mysqli_query($conexion, $sql);
            $valueCost = mysqli_fetch_assoc($consult);
            $total_voucher = array_sum($array2);
            $total_voucher = $total_voucher + $valueCost['PRICE'];
            $cambio = $pago - $total_voucher;
            //Consultando el carrito
            $sql2 = "SELECT *, PRICE*AMOUNT AS TOTAL FROM DETAIL_PRODUCT DP INNER JOIN DISCOUNTS DS ON DP.DISCOUNT_ID = DS.ID";
            $consult2 = mysqli_query($conexion, $sql2);
            if($consult2){
                while($row2 = mysqli_fetch_assoc($consult2)){
                    $bar = $row2['BARCODE'];
                    $pag = $row2['PACKAGING'];
                    //Consulta precio venta
                    $sql0 = "SELECT MAX(PRICE_BUY) AS PRICE_BUY FROM DETAIL_INVENTORY WHERE BARCODE = $bar AND PACKAGING = '$pag'";
                    $consult0 = mysqli_query($conexion, $sql0);
                    $row0 = mysqli_fetch_assoc($consult0);
                    print_r($row0);
                    $descuento = ($row2['TOTAL'] * $row2['DISCOUNT_PRICE']) / 100;
                    $array[$i] = [
                            "BARCODE" => $row2['BARCODE'], 
                            "AMOUNT" => $row2['AMOUNT'],
                            "PRICE_UNID" => $row2['PRICE'],
                            "PRICE_BUY" => $row0['PRICE_BUY'],
                            "PACKAGING" => $row2['PACKAGING'],
                            "TOTAL_ITEMS" => $items,
                            "DISCOUNT_ID" => $row2['DISCOUNT_ID'],
                            "TOTAL_REGISTER" => $row2['TOTAL'] - $descuento,
                            "TOTAL_VOUCHER" => $total_voucher,
                            ];
                    $items = $items + 1;
                    $i = $i + 1;
                }
                for ($i=0; $i < count($array); $i++) { 
                    $barcode = $array[$i]['BARCODE'];
                    $amount = $array[$i]['AMOUNT'];
                    $priceUnid = $array[$i]['PRICE_UNID'];
                    $priceBuy = $array[$i]['PRICE_BUY'];
                    $embalaje = $array[$i]['PACKAGING'];
                    $items = $array[$i]['TOTAL_ITEMS'];
                    $discount = $array[$i]['DISCOUNT_ID'];
                    $total_register = $array[$i]['TOTAL_REGISTER'];
                    $total_voucher = $array[$i]['TOTAL_VOUCHER'];
                    $sql3 = "INSERT INTO SALES(NRO_FACTURA, CED_NRO, DATE_VOUCHER, BARCODE, AMOUNT, PRICE_UNID, PRICE_BUY, PACKAGING, DISCOUNT_ID, COST_ADDITIONAL_ID, TOTAL_ITEMS, PAYMENT_METHOD_ID, PAY_CLIENT, EXCHANGE, TOTAL_REGISTER, TOTAL_VOUCHER)
                    VALUES('$id', $cedsale, '$date', $barcode, $amount, $priceUnid, $priceBuy,'$embalaje', $discount, $costAdi, $items, $methodPay, $pago, $cambio, $total_register, $total_voucher)";
                    $consult3 = mysqli_query($conexion, $sql3);
                }
                $array2 = [];
                for ($i=0; $i < count($array); $i++) { 
                    $barCode = $array[$i]['BARCODE'];
                    $embalaje1 = $array[$i]['PACKAGING'];
                    $sql4 = "SELECT BARCODE, AMOUNT FROM INVENTARIO WHERE BARCODE = $barCode AND PACKAGING = '$embalaje1'";
                    $consult4 = mysqli_query($conexion, $sql4);
                    $fila = mysqli_fetch_assoc($consult4);
                    $array2[$i] = ["BARCODE" => $fila['BARCODE'], "AMOUNT" => $fila['AMOUNT'] ];
                }
                if($consult4){
                    $arrayResta = [];
                    for($i=0; $i < count($array2); $i++){
                        $resta = $array2[$i]['AMOUNT'] - $array[$i]['AMOUNT'];
                        $arrayResta[$i] = ["BARCODE" => $array2[$i]['BARCODE'], "AMOUNT" => $resta];
                    }

                    for ($i=0; $i < count($arrayResta); $i++) { 
                        $amountCurrent = $arrayResta[$i]['AMOUNT'];
                        $barCode = $array2[$i]['BARCODE'];
                        $embalaje2 = $array[$i]['PACKAGING'];
                        $sql5 = "UPDATE INVENTARIO SET AMOUNT = $amountCurrent WHERE BARCODE = $barCode AND PACKAGING = '$embalaje2'";
                        $consult5 = mysqli_query($conexion, $sql5);
                    }
                    if($consult5){
                        die($id);
                    }
                    
                }
            }
        }
    }catch(Exception $ex){
        echo $ex;
    }
    
}elseif(isset($_POST['methodPay'])){
    $total = 0;
    $costAdi = $_POST['costAdi'];
    $array1 = [];
    $array2 = [];
    $sql = "SELECT * FROM DETAIL_PRODUCT DP INNER JOIN DISCOUNTS DS ON DP.DISCOUNT_ID = DS.ID";
    $consult = mysqli_query($conexion, $sql);
    $sql2 = "SELECT PRICE FROM COST_ADDITIONAL WHERE ID = $costAdi";
    $consult2 = mysqli_query($conexion, $sql2);
    $row2 = mysqli_fetch_assoc($consult2);
    $cost = $row2['PRICE'];
    while($row = mysqli_fetch_assoc($consult)){
        $precioUnid = $row['PRICE'];
        $cantidad = $row['AMOUNT'];
        $descuento = $row['DISCOUNT_PRICE'];
        $totalProducto = $precioUnid * $cantidad;
        array_push($array1, $totalProducto);
        $totalDescuento = ($totalProducto * $descuento) / 100;
        $subTotal = $totalProducto - $totalDescuento;
        $total = $total + $subTotal;
    }
    $subTotal = array_sum($array1);
    $array = ["subtotal" => $subTotal, "total" => $total + $cost];
    echo json_encode($array);
}
?>