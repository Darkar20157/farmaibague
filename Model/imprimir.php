<?php
date_default_timezone_set("America/Mexico_City");
require 'Conexiones.php';
require __DIR__ . '/../ticket/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$nombre_impresora = "POS-58"; 
try{
	$connector = new WindowsPrintConnector($nombre_impresora);
	$printer = new Printer($connector);

	/*================ Body de la Facturacion ==================*/
	$i = 0;
	$numFactura = $_POST['nroFactura'];
	$sql = "SELECT 
	SL.NRO_FACTURA, 
	SL.CED_NRO,
	CL.NAMES,
	CL.ADDRES,
	CL.PHONE,
	SL.DATE_VOUCHER,
	SL.BARCODE,
	BR.NAME_PRODUCT,
	SL.AMOUNT,
	SL.PRICE_UNID,
    DS.DISCOUNT_NAME,
    DS.DISCOUNT_PRICE,
    CA.COST_ADDITIONAL,
    CA.PRICE,
    PM.PAYMENT_NAME,
	SL.TOTAL_ITEMS,
	SL.TOTAL_REGISTER,
	SL.TOTAL_VOUCHER,
    SL.PAY_CLIENT,
    SL.EXCHANGE
	FROM SALES SL
	INNER JOIN CLIENTS CL ON SL.CED_NRO = CL.CED_NRO
	INNER JOIN DETAIL_ART BR ON SL.BARCODE = BR.BARCODE
    INNER JOIN COST_ADDITIONAL CA ON SL.COST_ADDITIONAL_ID = CA.ID
    INNER JOIN PAYMENT_METHOD PM ON SL.PAYMENT_METHOD_ID = PM.ID
    INNER JOIN DISCOUNTS DS ON SL.DISCOUNT_ID = DS.ID
	WHERE NRO_FACTURA = '$numFactura'";
	$consult = mysqli_query($conexion, $sql);
	while($row = mysqli_fetch_assoc($consult)){
		$array[$i] = ["NRO_FACTURA" => $row['NRO_FACTURA'], 
					"CED_NRO" => $row['CED_NRO'],
					"NAMES" => $row['NAMES'],
					"ADDRES" => $row['ADDRES'],
					"PHONE" => $row['PHONE'],
					"DATE_VOUCHER" => $row['DATE_VOUCHER'],
					"BARCODE" => $row['BARCODE'],
					"NAME_PRODUCT" => $row['NAME_PRODUCT'],
					"AMOUNT" => $row['AMOUNT'],
					"PRICE_UNID" => $row['PRICE_UNID'],
					"DISCOUNT_NAME" => $row['DISCOUNT_NAME'],
					"DISCOUNT_PRICE" => $row['DISCOUNT_PRICE'],
					"COST_ADDITIONAL" => $row['COST_ADDITIONAL'],
					"PRICE" => $row['PRICE'],
					"PAYMENT_NAME" => $row['PAYMENT_NAME'],
					"TOTAL_ITEMS" => $row['TOTAL_ITEMS'],
					"TOTAL_REGISTER" => $row['TOTAL_REGISTER'],
					"TOTAL_VOUCHER" => $row['TOTAL_VOUCHER'],
					"PAY_CLIENT" => $row['PAY_CLIENT'],
					"EXCHANGE" => $row['EXCHANGE']
					];
					$i = $i + 1;
	}
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	$printer->text("Drogueria FarmaIbague");
	$printer->text("\n"."Nit: 65765609-4" . "\n");
	$printer->text("Direccion: Manzana 14 casa 7" . "\n");
	$printer->text("Barrio: Cantabria" . "\n");
	$printer->text("Tel: " . "\n");

	$printer->text("======DATOS PRINCIPALES======" . "\n");
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text("FACTURA: ".$array[0]["NRO_FACTURA"]."\n");
	$printer->text("FECHA: ".$array[0]["DATE_VOUCHER"] . "\n");
	$printer->text("CC/NIT: ".$array[0]['CED_NRO'] . "\n");
	$printer->text("NOM: ".$array[0]['NAMES'] . "\n");
	$printer->text("DIR: ".$array[0]['ADDRES']. "\n");
	$printer->text("CIUDAD: IBAGUE - TOLIMA" . "\n");
	$printer->text("TEL: ".$array[0]['PHONE'] . "\n");
	$printer->text("======DETALLES PRODUCTOS======\n");
	$i = 1;
	for ($j=0; $j < count($array); $j++) { 
		$descuento = $array[$j]['DISCOUNT_PRICE'];
		$printer->text("Cant. ".$array[$j]['AMOUNT']."\n");
		$printer->text("Producto: ".$array[$j]['NAME_PRODUCT']."\n");
		$printer->text("Precio Unid.: $".number_format($array[$j]["PRICE_UNID"],0,',','.')."\n");
		$printer->text("Descuento: ".$array[$j]['DISCOUNT_PRICE']."% "."\n");
		$printer->text("Subtotal: $".number_format($array[$j]["TOTAL_REGISTER"] - $descuento,0,',','.')."\n");
		$printer->text("============================="."\n");
		$i = $i + 1;
	}
	// $printer->text("======RESUMEN DE IMPUESTOS======"."\n");
	// $printer->text("IMPUESTO: IVA19%        $500"."\n");
	// $printer->text("================================"."\n");
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	$printer->text("=======COSTOS ADICIONALES======="."\n");
	$printer->text("DOMICILIO:            $".$array[0]['PRICE']."\n");
	$printer->text("================================"."\n");
	$printer->text("=========FORMAS DE PAGO========="."\n");
	$printer->text($array[0]['PAYMENT_NAME'].":             $".number_format($array[0]["TOTAL_VOUCHER"],0,',','.')."\n");
	$printer->text("================================"."\n");
	$printer->setJustification(Printer::JUSTIFY_RIGHT);
	$printer->text("==========TOTALES==============="."\n");
	$printer->text("Total Factura: $".number_format($array[0]["TOTAL_VOUCHER"],0,',','.')."\n");
	$printer->text("Pago: $".number_format($array[0]['PAY_CLIENT'],0,',','.')."\n");
	$printer->text("Cambio: $".number_format($array[0]['EXCHANGE'],0,',','.')."\n");
	$printer->text("================================"."\n");
}catch(Exception $ex){
	echo $ex;
}


// // /*
// // 	Podemos poner también un pie de página
// // */
// $printer->setJustification(Printer::JUSTIFY_CENTER);
// $printer->text("\nMuchas gracias por su compra\n");



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
/*
$printer->text("\n"."Mi princesa Hermosa" . "\n");
$printer->text("\n"."" . "\n");
$printer->text("Te doy este pequeño obsequio" . "\n");
$printer->text("Para: Jasiel Valentina" . "\n");
$printer->text("De tu enamorado: ???" . "\n");

$printer->text("\n"."" . "\n");
$printer->text("Quiero que sepas que eres la" ."\n");
$printer->text("primera persona en la que pienso" . "\n");
$printer->text("Al dormir" . "\n");
$printer->text("" . "\n");
$printer->text("Te amo <3 <3 <3 <3" . "\n");
*/
?>
