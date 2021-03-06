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

    function iniciarS(PDO $db,$nombre,$password,$recordar,$quieroR){
        $command4="
        SELECT * FROM users WHERE name = :name AND password = '$password'";
        try{
            $result = $db->prepare($command4);
            $result->execute(array(':name'=> $nombre));
            $comprob = $result->fetchColumn();
            
            if($comprob>0){
                if(isset($recordar)){ //comprobamos si esta pulsado recordar
                    setcookie("nombre",$nombre);    //añadimos las cookies
                    setcookie("contraseña",$password);
                    setcookie("ultimaSesion",date("d-m-Y"));
                    
                }
                if($quieroR==true){
                    header("Location: htmls/formulario.html");
                }
                else{
                    header("Location: htmls/succ_login.html");
                }
            }
            else{
                if($quieroR==true){
                    setcookie("userR",$nombre);
                    header("Location: htmls/registro.php");
                }
                else{
                    header("Location: htmls/formulario.html");
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }