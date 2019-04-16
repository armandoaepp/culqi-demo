<?php
# Autor: Armando Enrique Pisfil Puemape tw: @armandoaepp
header('content-type: application/json; charset=utf-8');

// require 'vendor/autoload.php';
require __DIR__.'/bootstrap/autoload.php';

use App\Controllers\CargoController;

include_once "./send-charge-culqi.php";      #LINEA xa DESARROLLO

// para crear usuario

if (isset($_GET["accion"])) {
    $evento = $_GET["accion"];
} elseif (isset($_POST)) {
    $inputs = json_decode(file_get_contents("php://input"));
    $evento = $inputs->accion;
}

// echo date('YmdHis');



switch ($evento) {

    case "set":
        try {

            $count = App\Models\Cargo::count();

            $code = ( ($count + 1 ) * 30)  ;
            $code = str_pad($code, 5, "0", STR_PAD_LEFT);

            $nombre        = '';
            $apellidos     = '';
            $amount        = !empty($inputs->monto) ? $inputs->monto            : 990;
            $currency_code = !empty($inputs->tipo_moneda) ? $inputs->tipo_moneda: "USD";
            $description   = !empty($inputs->descripcion) ? $inputs->descripcion: "";

            $email         = $inputs->email;
            $source_id     = $inputs->token;
            $estado        = 1 ;
            // $telefono = !empty($inputs->telefono) ? $inputs->telefono : '';
            // $direccion = !empty($inputs->direccion) ? $inputs->direccion : '';

            $cliente = $nombre . " " .$apellidos ;


            $params = array(
                'code'          => $code,
                'nombre'        => $nombre,
                'apellidos'     => $apellidos,
                'amount'        => $amount,
                'currency_code' => $currency_code,
                'description'   => $description,
                'email'         => $email,
                'source_id'     => $source_id,
                'estado'        => $estado,
            );

            // $demo = CargoController::save($params) ;



            // if (create_charge($token, $email, $amount, $cliente,  $currency_code) == true) {
            if (create_charge($params) == true) {
                $estado = 1;

                $cargo_controller = new CargoController();

                $status = $cargo_controller->save($params) ;
                sendMailShopping($params) ;

            } else {
                $estado = 0;
            }

            $data = [];

            $response = array('msg' => 'Registrado correcto', 'error' => false, 'data' => $data);

        } catch (Exception $e) {
            $response = array('msg' => $e->getMessage(), 'error' => true, 'data' => array());
        }

        $jsn = json_encode($response);
        print_r($jsn);
    break;

}


// function sendMailShopping($nombre, $email, $audio)
function sendMailShopping($params)
{
  extract($params) ;

  $tipoLib = ($audio==1)?"Audio Libro":"Libro Digital";
  $data = array(
  'code'  => $code,
  );

  $file = APP."views/mail-descarga.phtml";
  $template = file_get_contents($file);
  foreach ($data as $clave=>$valor){
    $template = str_replace("{".$clave."}", strtoupper($valor), $template);
    //
    //echo "{$clave}"."<br>";
  }
  //echo $template;
  $BODY_MSJ = $template;
//   unset($clave);unset($valor);

  $header = "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html; charset=utf-8\r\n";
  $header .= "X-Priority: 3\n";
  $header .= "X-MSMail-Priority: Normal\n";
  $header .= "X-Mailer:PHP/".phpversion()."\n";
  $header .= "From: Admin template <informes@armandotuweb.net> \r\n";
//   $header .= "Bcc: marlon@catmedia.com.pe \r\n";
  $header .= "Cc: armandoaepp@gmail.com \r\n";
  mail($email,"Admin Template Bootstrap ",utf8_decode($BODY_MSJ),$header);
}