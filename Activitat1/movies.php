<?php
    $pelis = [
        ["Titulo" => "EndGame","Prota" => "Robert Downey jr.", "Año" => "2019"],
        ["Titulo" => "300","Prota" => "Gerard Butler", "Año" => "2006"],
        ["Titulo" => "El hoyo","Prota" => "Ivan Massagué", "Año" => "2019"]
    ];

    if(isset($_GET["movieName"]) && isset($_GET["movieStar"])){

        foreach($pelis as $peli){
            foreach($peli as $valor=>$inter){
                if($valor=='Titulo'){
                    if($inter==$_GET["movieName"])
                    $rest1 = true;
                }
                else{
                    $rest = false;
                }
                if($valor=='Prota'){
                    if($inter==$_GET["movieStar"])
                    $rest2 = true;
                }
                else{
                    $rest2 = false;
                }

                if($rest1 == true and $rest2 == true){
                    $año=$pelis[2];
                    $compro=true;
                }
                else{
                    $compro=false;
                }

            }
        }

        if($compro == true){
            $final = "<h1>Informació sobre la pel·licula ".$_GET["movieName"]."</h1><br>
            <p>Basat en la teva entrasa, aquí tens la informació</p><br><p>
            ".$_GET["movieStar"]." protagonitza la pel·licula ".$_GET["movieName"]." que es va produir en".$año."</p>";
        }
        else{
            $final = "<h1>No se ha encontrado la pelicula introducida</h1>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  $final ?>
</body>
</html>