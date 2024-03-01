<?php
require_once('cls_conexion.model.php');
class Clase_aerolinea
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `aerolinea`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_aerolinea)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `aerolinea` WHERE ID_aerolinea =$ID_aerolinea ";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Nombre, $Pais, $Flota, $Alianzas)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `aerolinea`(`Nombre`, `Pais`, `Flota`, `Alianzas`) VALUES ('$Nombre','$Pais','$Flota','$Alianzas')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ID_aerolinea, $Nombre, $Pais, $Flota, $Alianzas)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `aerolinea` SET `Nombre`='$Nombre',`Pais`='$Pais',`Flota`='$Flota',`Alianzas`='$Alianzas' WHERE ID_aerolinea =$ID_aerolinea ";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_aerolinea)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `aerolinea` WHERE ID_aerolinea =$ID_aerolinea ";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    // public function Alianzas_repetida($Alianzas)
    // {
    //     try {
    //         $con = new Clase_Conectar_Base_Datos();
    //         $con = $con->ProcedimientoConectar();
    //         $cadena = "SELECT count(*) as Alianzas_repetida FROM `aerolinea` WHERE `Alianzas`= '$Alianzas'";
    //         $result = mysqli_query($con, $cadena);
    //         return $result;
    //     } catch (Throwable $th) {
    //         return $th->getMessage();
    //     } finally {
    //         $con->close();
    //     }
    // }
}
