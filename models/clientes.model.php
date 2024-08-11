<?php
// Clase de Clientes
require_once('../config/config.php');

class Clientes
{
    //  obtener todos los clientes
    public function todos() // select * from clientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //  obtener un cliente por su ID
    public function uno($idClientes) // select * from clientes where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` WHERE `idClientes` = $idClientes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //  insertar un nuevo cliente
    public function insertar($Nombre_Cliente, $Direccion, $Telefono, $Email) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `clientes` (`Nombre_Cliente`, `Direccion`, `Telefono`, `Email`) VALUES ('$Nombre_Cliente', '$Direccion', '$Telefono', '$Email')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    //  actualizar un cliente existente
    public function actualizar($idClientes, $Nombre_Cliente, $Direccion, $Telefono, $Email) // update clientes set nombre = $nombre, direccion = $direccion, telefono = $telefono, email = $email where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `clientes` SET `Nombre_Cliente` = '$Nombre_Cliente', `Direccion` = '$Direccion', `Telefono` = '$Telefono', `Email` = '$Email' WHERE `idClientes` = $idClientes";
            if (mysqli_query($con, $cadena)) {
                return $idClientes;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    //  eliminar un cliente
    public function eliminar($idClientes) // delete from clientes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `clientes` WHERE `idClientes` = $idClientes";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
?>
