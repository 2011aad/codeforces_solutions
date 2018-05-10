<?php

function canRejoin($str)
{
    $links  = 0;
    $pearls = 0;
    foreach (str_split($str, 1) as $ch){
        if($ch === '-'){
            $links++;
        }
        elseif($ch === 'o'){
            $pearls++;
        }
    }
    if(intval($pearls) === 0) return true;
    return intval($links) % intval($pearls) == 0;
}

function main()
{
    $str = fread(STDIN, 4096);
    echo canRejoin($str)? 'YES':'NO';
}

main();