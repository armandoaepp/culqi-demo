<?php
/**
 * Ejemplo 2
 * Como crear un charge a una tarjeta usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../Requests-master/library/Requests.php';
  Requests::register_autoloader();
  require '../lib/culqi.php';


  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_c9B0OargKlyrezuX";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));
  
  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
        "amount" => "36.80",
        "currency_code" => "PEN",
        "email" => "prueba@culqi.com",
        "source_id" => $_POST["token"] ,
        "antifraud_details" => array(
            "address" =>"Calle Narciso de la Colima",
            "address_city"=> "Lima",
            "country_code" => "PE",
            "first_name" => "Liz",
            "last_name" => "Ruelas",
            "phone_number" => 123456789
          )
      )
  );
  // Respuesta
  echo "ok";
  
} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
