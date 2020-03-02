<?php

function guardar() {
    $razonsocial = $_POST['razon_social'];
    $tipodoc = $_POST['tipodoc'];
    $numdoc = $_POST['numdoc'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $tipopersona = @$_POST['tipopersona'];
    $activo = @$_POST['activo'];
    $inactivo = @$_POST['inactivo'];
    $fecha = $_POST['fecha'];


    $mensaje = "";

    if (trim($razonsocial)=="") {
        $mensaje = "Debe ingresar un nombre de empresa o razón social.<br/>";
    }

    if ($tipodoc=="Elegir") {
        $mensaje .= "Debes ingresar tu tipo de documento.<br/>";
    }

    if (strlen($numdoc) > 12 || strlen($numdoc) < 8) {
        $mensaje .= "Tu identificación debe tener menos de 12 y más de 8 carácteres.<br/>";
    }

    if (trim($numdoc)=="") {
        $mensaje .= "Debes ingresar tu numero de identificacion.<br/>";
    }

    if (trim($telefono) == "") {
        $mensaje .= "Debes ingresar un telefono fijo.<br/>";
    }
    
    if (strlen($telefono) > 9) {
        $mensaje .= "Tu telefono fijo no debe tener más 8 carácteres.<br/>";
    }
    
    if (strlen($celular)>10 || strlen($celular)<10) {
        $mensaje .= "Tu celular debe tener 10 dígitos.<br/>";
    }

    if (trim($correo) == "") {
        $mensaje .= "Debes ingresar un correo eléctronico.<br/>";
    }

    if (trim($tipopersona) == "") {
        $mensaje .= "Debes ingresar que tipo de persona eres.<br/>";
    }

    if (trim($fecha) == "") {
        $mensaje .= "Debes ingresar una fecha<br/>";
    }

    echo $mensaje;
    
    if($mensaje == ""){
    require 'conexion.php';
    $con = new Conexion();
    $conectar = $con->conectar();
    $sql = "INSERT INTO `usuario`(`razon_social`, `documento`, `tipo_doc`, `telefono`, `celular`, `correo`, `tipo_persona`,"
            . " `activo`, `fecha_ingreso`) VALUES ('$razonsocial','$numdoc','$tipodoc','$telefono','$celular','$correo','$tipopersona',"
            . "'$activo,$inactivo','$fecha')";

    if ($conectar->query($sql) == 1) {
        header("location:registros.php");
    } else {
        $mensaje = "Ya existe un registro con: $numdoc";
    }

    echo $mensaje;
    }
}

function actualizar() {
    $razonsocial = $_POST['razon_social'];
    $tipodoc = $_POST['tipodoc'];
    $numdoc = $_POST['numdoc'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $tipopersona = @$_POST['tipopersona'];
    $activo = @$_POST['activo'];
    $inactivo = @$_POST['inactivo'];
    $fecha = $_POST['fecha'];


    $mensaje = "";

    if (trim($razonsocial)=="") {
        $mensaje = "Debe ingresar un nombre de empresa o razón social.<br/>";
    }

    if ($tipodoc=="Elegir") {
        $mensaje .= "Debes ingresar tu tipo de documento.<br/>";
    }

    if (strlen($numdoc) > 12 || strlen($numdoc) < 8) {
        $mensaje .= "Tu identificación debe tener menos de 12 y más de 8 carácteres.<br/>";
    }

    if (trim($numdoc)=="") {
        $mensaje .= "Debes ingresar tu numero de identificacion.<br/>";
    }

    if (trim($telefono) == "") {
        $mensaje .= "Debes ingresar un telefono fijo.<br/>";
    }
    
    if (strlen($telefono) > 9) {
        $mensaje .= "Tu telefono fijo no debe tener más 8 carácteres.<br/>";
    }
    
    if (strlen($celular)>10 || strlen($celular)<10) {
        $mensaje .= "Tu celular debe tener 10 dígitos.<br/>";
    }

    if (trim($correo) == "") {
        $mensaje .= "Debes ingresar un correo eléctronico.<br/>";
    }

    if (trim($tipopersona) == "") {
        $mensaje .= "Debes ingresar que tipo de persona eres.<br/>";
    }

    if (trim($fecha) == "") {
        $mensaje .= "Debes ingresar una fecha<br/>";
    }

    echo $mensaje;
    
    if($mensaje == ""){


    require 'conexion.php';
    $con = new Conexion();
    $conectar = $con->conectar();
    $sql = "UPDATE `usuario` SET `razon_social`='$razonsocial',`tipo_doc`='$tipodoc',`telefono`='$telefono',`celular`='$celular',"
            . "`correo`='$correo',`tipo_persona`='$tipopersona',`activo`='$activo$inactivo',`fecha_ingreso`='$fecha' WHERE documento='$numdoc'";

    if ($conectar->query($sql) == 1) {
        header("location:registros.php");
    } else {
        $mensaje = "No se actualizó";
    }

    echo $mensaje;
    }
}

if ($_POST['accion'] == 'Actualizar') {
    actualizar();
} else if ($_POST['accion'] == 'Guardar') {
    guardar();
} else if ($_POST['accion'] == 'Consultar') {
    consultar();
}

