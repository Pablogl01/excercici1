<?php

    function schemaGenerator(PDO $db){
        $command='
        CREATE TABLE IF NOT EXISTS users(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(100) NOT NULL ,
            password VARCHAR(100) NOT NULL 
        )';
        try{
            $db->exec($command);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    function insert(PDO $db, $nombre, $password){ //introducimos los nombre para luego llamar a la funcion desde login.php
        $command2="
        INSERT INTO users (name,password)
        VALUES ('$nombre', '$password')";
        try{
            $db->exec($command2);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    function delete(PDO $db, string $userDelete){
        $command3="
        DELETE FROM users WHERE name='$userDelete'";
        try{
            $db->exec($command3);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    function iniciarS(PDO $db,$nombre,$password){
        $command4="
        SELECT * FROM users WHERE name='$nombre' AND password='$password'";
        try{
            $final=$db->exec($command4);
            $ret = sqlite_array_query($gestor_bd, 'SELECT name, email FROM users LIMIT 25', SQLITE_ASSOC);
            return $ret;

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }