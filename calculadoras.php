<?php
    declare(strict_types=1);


    function performOperation(String $oper, $num){
        switch($oper){
            case "factorial":
                return factorial($num);
            case "sum":
                return numA($num);
            case "prime":
                return primo($num);
        }
    }

    function factorial(int $n):string{
        $i = 1;
        $v1 = 1;

        while($i<=$n){
            $v1 = $i * $v1;
            $i ++;
        }
        return (string) $v1;
    }

    function numA(array $a):string{
        if(is_array($a)){
            return (string) array_sum($a);
        }
        else{
            return "no es un array";
        }
        
    }


    function primo(int $number):bool{
        if(is_int($number)){
            if ($number == 2 || $number == 3 || $number == 5 || $number == 7) {
                return True;
            } else {
                if ($number % 2 != 0) {
                    for ($i = 3; $i <= sqrt($number); $i += 2) {
                        
                        if ($number % $i == 0){
                            return False;
                        }
                    }
                    return True;
                }
            }
            return False;
        }
        else{
            return False;
        }
    }

    echo performOperation("factorial",15);
?>