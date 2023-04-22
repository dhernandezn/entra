<?php 
require_once("database.php");
function validarPass($user,$pass){
    echo "Pass Ingresada: ".$pass."<br>";
    $dbc = Database::getInstance();
    $consulta = $dbc -> prepare("SELECT pw_usuario FROM usuarios WHERE n_usuario = :nuser");
    $consulta -> bindParam(':nuser',$user);
    $consulta -> execute();
    $hash = $consulta->fetchColumn();
    echo "Contraseña Guardada: ".$hash."<br>";
    //$concat = $salt.$pass;
    if(password_verify($pass,$hash)){
        echo "tamos bien";
    }else{
        echo "malisimo";
    }
}
validarPass("dahn","dahn");