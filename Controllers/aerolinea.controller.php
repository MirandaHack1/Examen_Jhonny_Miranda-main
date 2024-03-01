<?php
require_once('../Models/cls_aerolinea.model.php');
$aerolinea = new Clase_aerolinea;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $aerolinea->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_aerolinea  = $_POST["ID_aerolinea"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $aerolinea->uno($ID_aerolinea); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Pais = $_POST["Pais"];
        $Flota = $_POST["Flota"];
        $Alianzas  = $_POST["Alianzas"];
        $datos = array(); //defino un arreglo
        $datos = $aerolinea->insertar($Nombre, $Pais, $Flota, $Alianzas); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_aerolinea = $_POST["ID_aerolinea"];
        $Nombre = $_POST["Nombre"];
        $Pais = $_POST["Pais"];
        $Flota = $_POST["Flota"];
        $Alianzas  = $_POST["Alianzas"];
        $datos = array(); //defino un arreglo
        $datos = $aerolinea->actualizar($ID_aerolinea, $Nombre, $Pais, $Flota, $Alianzas); //llamo al modelo de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_aerolinea = $_POST["ID_aerolinea"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $aerolinea->eliminar($ID_aerolinea); //llamo al modelo de usuarios e invoco al procedimiento eliminar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    // case "Alianzas_repetida":
    //     $Alianzas = $_POST["Alianzas"];
    //     $datos = array(); //defino un arreglo
    //     $datos = $aerolinea->Alianzas_repetida($Alianzas); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
    //     $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
    //     echo json_encode($uno); //devuelvo el arreglo en formato json
    //     break;
}
