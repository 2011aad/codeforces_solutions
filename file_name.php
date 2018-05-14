<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/13
 * Time: 17:25
 */

function removeCount($str)
{
    $char_arr = str_split($str, 1);

    $counter = 0;

    $need_remove = 0;
    foreach ($char_arr as $ch){
        if($ch === 'x'){
            $counter++;
        }
        else{
            $counter = 0;
        }

        if($counter === 3){
            $need_remove++;
            $counter--;
        }
    }

    return $need_remove;
}

function main()
{
    $n = intval(fgets(STDIN));
    $str = fgets(STDIN);

    echo removeCount($str)."\n";
}

main();