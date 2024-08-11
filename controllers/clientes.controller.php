<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

// ruta de  modelo de clientes
require_once('../models/clientes.model.php');
error_reporting(0);
$clientes = new Clientes;

switch ($_GET["op"]) {
    // cargar todos los datos de los clientes
    case 'todos':
        $datos = array();
        $datos = $clientes->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    // obtener un cliente por su ID
    case 'uno':
        $idClientes = $_POST["idClientes"];
        $datos = array();
        $datos = $clientes->uno($idClientes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    // insertar un nuevo cliente
    case 'insertar':
        $Nombre_Cliente = $_POST["Nombre_Cliente"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Email = $_POST["Email"];
        
        $datos = array();
        $datos = $clientes->insertar($Nombre_Cliente, $Direccion, $Telefono, $Email);
        echo json_encode($datos);
        break;

    // actualizar un cliente
    case 'actualizar':
        $idClientes = $_POST["idClientes"];
        $Nombre_Cliente = $_POST["Nombre_Cliente"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Email = $_POST["Email"];
        
        $datos = array();
        $datos = $clientes->actualizar($idClientes, $Nombre_Cliente, $Direccion, $Telefono, $Email);
        echo json_encode($datos);
        break;

    // eliminar un cliente
    case 'eliminar':
        $idClientes = $_POST["idClientes"];
        $datos = array();
        $datos = $clientes->eliminar($idClientes);
        echo json_encode($datos);
        break;
}
?>
