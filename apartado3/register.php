<?php

require __DIR__.'/src/connect.php'; //añadimos los archivos connect y schema
require __DIR__.'/src/schema.php';

$nombre=$_COOKIE['userR']; //cogemos los valores desde el formulario
$password=filter_input(INPUT_POST,"pass");
$password2=filter_input(INPUT_POST,"pass2");


$dbname="database";
$base=connectSqlite($dbname); //conectamos con la base de datos

if($password!=null and $password2!=null){ //comprobamos si la password y password2 son iguales
    if($password == $password2){
        $verifiR = true;
        iniciarS($base, $nombre, $password, $recordar, $quieroR, $verifiR);
        //insert($base,$nombre,$password);
        echo "usuario registrado";
        ///////setcookie('userR',"");
    }
    else{
        echo "Revisa las contraseñas";    //si no hay nada en contraseña o name te lo recuerdo
    }
}