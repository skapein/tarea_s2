<?php
// Clase de Productos
require_once('../config/config.php');

class Productos
{
    //  obtener todos los productos
    public function todos() // select * from productos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //  obtener un producto por su ID
    public function uno($idProductos) // select * from productos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos` WHERE `idProductos` = $idProductos";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //  insertar un nuevo producto
    public function insertar($Nombre_Producto, $Descripcion, $Precio, $Stock) // insert into productos (nombre, descripcion, precio, stock) values ($nombre, $descripcion, $precio, $stock)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `productos` (`Nombre_Producto`, `Descripcion`, `Precio`, `Stock`) VALUES ('$Nombre_Producto', '$Descripcion', '$Precio', '$Stock')";
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

    //  actualizar un producto existente
    public function actualizar($idProductos, $Nombre_Producto, $Descripcion, $Precio, $Stock) // update productos set nombre = $nombre, descripcion = $descripcion, precio = $precio, stock = $stock where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `productos` SET `Nombre_Producto` = '$Nombre_Producto', `Descripcion` = '$Descripcion', `Precio` = '$Precio', `Stock` = '$Stock' WHERE `idProductos` = $idProductos";
            if (mysqli_query($con, $cadena)) {
                return $idProductos;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    //  eliminar un producto
    public function eliminar($idProductos) // delete from productos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `productos` WHERE `idProductos` = $idProductos";
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
