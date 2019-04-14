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



switch ($evento) {

    case "set":
        try {

            $count = App\Models\Cargo::count();

            $code = ( ($count + 1 ) * 30)  ;
            $code = str_pad($code, 5, "0", STR_PAD_LEFT);

            $nombre        = 'Armando ';
            $apellidos     = 'Pisfil P';
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

                $status = CargoController::save($params) ;

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


