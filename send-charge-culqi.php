<?php
header('Content-Type: application/json');

function create_charge($TOKEN, $EMAIL, $MONTO, $META_CLIENTE, $TIPO_MONEDA = 'USA'){
  try {

    // Cargamos Requests y Culqi PHP
    // include_once dirname(__FILE__).'/libraries/Requests/library/Requests.php';
    // Requests::register_autoloader();
    // include_once dirname(__FILE__).'/libraries/culqi-php/lib/culqi.php';


    require "culqi-php/culqi-php-develop/Requests-master/library/Requests.php";
    Requests::register_autoloader();
    require "culqi-php/culqi-php-develop/lib/culqi.php";

    require "ConexApiCulqi.php";

    $KEY = new ConexApiCulqi();
    $SECRET_API_KEY = $KEY->dev_key();

    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

    $charge = $culqi->Charges->create(
      array(
        "currency_code" => $TIPO_MONEDA,
        "email" => "$EMAIL",
        "amount" => "$MONTO",
        "source_id" => $TOKEN ,
        "metadata" => array(
          "Cliente" => "$META_CLIENTE",
        )
      )
    );
    //echo json_encode($charge);
    return true;
  }
  catch (Exception $e) {
    // echo json_encode($e->getMessage());
    throw new Exception( $e->getMessage() );
  }
}