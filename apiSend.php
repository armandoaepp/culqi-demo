<?php
# Autor: Armando Enrique Pisfil Puemape tw: @armandoaepp
header('content-type: application/json; charset=utf-8');

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

            $nombre ='';
            $apellidos = '';

            $token = $inputs->token;
            $email = $inputs->email;
            // $telefono = !empty($inputs->telefono) ? $inputs->telefono : '';
            // $direccion = !empty($inputs->direccion) ? $inputs->direccion : '';
            $monto = !empty($inputs->monto) ? $inputs->monto : 990;
            $tipo_moneda = !empty($inputs->tipo_moneda) ? $inputs->tipo_moneda : "USA";

            $cliente = $nombre . " " .$apellidos ;


            if (create_charge($token, $email, $monto, $cliente,  $tipo_moneda) == true) {
                // $estado = 1;

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


