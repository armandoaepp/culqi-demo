<?php
header('Content-Type: application/json');

// function create_charge($TOKEN, $EMAIL, $MONTO, $META_CLIENTE, $TIPO_MONEDA = 'USD'){
  function create_charge($params){
  try {

    // Cargamos Requests y Culqi PHP

    // require "culqi-php/culqi-php-develop/Requests-master/library/Requests.php";
    // Requests::register_autoloader();
    // require "culqi-php/culqi-php-develop/lib/culqi.php";

    // require 'vendor/autoload.php';
    extract($params);

    require "ConexApiCulqi.php";

    $KEY = new ConexApiCulqi();
    $SECRET_API_KEY = $KEY->dev_key();

    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));


    $charge = $culqi->Charges->create(
              array(
                "amount" => $amount,
                "capture" => true,
                "currency_code" => $currency_code,
                "description" => "admin template bootstrap 4",
                "email" => $email,
                "source_id" => $source_id,
                "antifraud_details" => array(
                  "address" => "Compra-$code",
                  // "address_city" => "LIMA",
                  // "country_code" => "PE",
                  // "first_name" => "Will",
                  // "last_name" => "Muro",
                  // "phone_number" => "9889678986",
                ),
                // "installments" => 0,
              )
          );


    return true;
  }
  catch (Exception $e) {
    // echo json_encode($e->getMessage());
    throw new Exception( $e->getMessage() );
  }
}