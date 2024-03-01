<?php
require_once('../Models/cls_vuelo.model.php');
$vuelo = new Clase_vuelo;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $vuelo->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_vuelo = $_POST["ID_vuelo"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $vuelo->uno($ID_vuelo); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $ID_aerolinea = $_POST["ID_aerolinea"];
        $Numero_vuelo = $_POST["Numero_vuelo"];
        $Origen = $_POST["Origen"];
        $Destino = $_POST["Destino"];
        $Fecha_salida = $_POST["Fecha_salida"];

        $datos = array(); //defino un arreglo
        $datos = $vuelo->insertar($ID_aerolinea, $Numero_vuelo, $Origen, $Destino, $Fecha_salida); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_vuelo = $_POST["ID_vuelo"];
        $ID_aerolinea = $_POST["ID_aerolinea"];
        $Numero_vuelo = $_POST["Numero_vuelo"];
        $Origen = $_POST["Origen"];
        $Destino = $_POST["Destino"];
        $Fecha_salida = $_POST["Fecha_salida"];
        $datos = array(); //defino un arreglo
        $datos = $vuelo->actualizar($ID_vuelo, $ID_aerolinea, $Numero_vuelo, $Origen, $Destino, $Fecha_salida); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_vuelo = $_POST["ID_vuelo"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $vuelo->eliminar($ID_vuelo); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
