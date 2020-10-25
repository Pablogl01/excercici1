<?php

require __DIR__.'/src/connect.php'; //añadimos los archivos connect y schema
require __DIR__.'/src/schema.php';

$nombre=filter_input(INPUT_POST,"name"); //cogemos los valores desde el formulario
$password=filter_input(INPUT_POST,"pass");
$recordar=filter_input(INPUT_POST,"Recordar");
$registrar=filter_input(INPUT_POST,"Registrar");

$dbname="database";
$base=connectSqlite($dbname); //conectamos con la base de datos
$quieroR = false;
if($nombre!=null and $password!=null){ //comprobamos si nombre y password tienen contenido
    if(isset($registrar)){  //comprobamos si registrar esta pulsada
        $quieroR = true;
        //insert($base,$nombre,$password);    //llamamos a la funcion insert para añadir a la base de datos
    }
    iniciarS($base, $nombre, $password, $recordar, $quieroR);    //llamamos a la funcion iniciarS para ver si el usuario esta en la base de datos
}
else{
    echo "Pon bien el usuario y contraseña";    //si no hay nada en contraseña o name te lo recuerdo
}
