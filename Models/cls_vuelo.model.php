<?php
require_once('cls_conexion.model.php');
class Clase_vuelo
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT vuelo.ID_vuelo, vuelo.ID_aerolinea, vuelo.Numero_vuelo, vuelo.Origen, vuelo.Destino, vuelo.Fecha_salida ,aerolinea.Nombre as aerolinea FROM `vuelo` inner JOIN aerolinea on aerolinea.ID_aerolinea  = vuelo.ID_aerolinea";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_vuelo)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `vuelo` WHERE ID_vuelo =$ID_vuelo ";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($ID_aerolinea,$Numero_vuelo, $Origen, $Destino, $Fecha_salida)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `vuelo`(`ID_aerolinea`, `Numero_vuelo`, `Origen`, `Destino`, `Fecha_salida` )VALUES ($ID_aerolinea,'$Numero_vuelo', '$Origen','$Destino', '$Fecha_salida')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ID_vuelo , $ID_aerolinea , $Numero_vuelo, $Origen, $Destino, $Fecha_salida)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `vuelo` SET  `ID_aerolinea` ='$ID_aerolinea', `Numero_vuelo`='$Numero_vuelo', `Origen`='$Origen', `Destino`='$Destino', `Fecha_salida`='$Fecha_salida'  WHERE `ID_vuelo`='$ID_vuelo'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_vuelo )
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE  FROM `vuelo` WHERE `ID_vuelo`='$ID_vuelo'"; 
            // from vuelo where ID_vuelo =$ID_vuelo ;
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}
