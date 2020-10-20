<?php

    ini_set('display_errors'.'On'); //esto nos permitira ver si hay algún error
    require __DIR__.'/src/connect.php'; //añadimos los archivos connect y schema
    require __DIR__.'/src/schema.php';
    $dbname="database"; //declaramos el nombre de la base de datos
    $base=connectSqlite($dbname);                      
    schemaGenerator($base);
    header("Location: htmls/formulario.html");
?>