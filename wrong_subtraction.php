<?php

function wrong_subtraction($number, $k)
{
    while($k-- > 0){
        if($number % 10 == 0){
            $number /= 10;
        }
        else{
            $number--;
}
}
return $number;
}

function main()
{
    $data = fread(STDIN, 4096);
    list($num, $k) = explode(" ", $data);
    echo wrong_subtraction(intval($num), intval($k));
}

main();