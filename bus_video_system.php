<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/13
 * Time: 19:07
 */


function possiblePeople($arr, $capacity)
{
    $cur = 0;

    $min = 0;
    $max = 0;

    foreach ($arr as $x){
        $cur += $x;
        $min = min($cur, $min);
        $max = max($cur, $max);
    }

    if($max - $min > $capacity) return 0;
    return $capacity - ($max - $min) + 1;
}


function main()
{
    list($n, $w) = explode(" ", stream_get_line(STDIN, 4096, "\n"));
    $arr = array();

    for($i=0; $i<intval($n)-1; $i++){
        $arr[] = intval(stream_get_line(STDIN, 4096, " "));
    }
    $arr[] = intval(stream_get_line(STDIN, 4096, "\n"));

    echo possiblePeople($arr, $w)."\n";
}

main();