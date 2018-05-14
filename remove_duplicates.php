<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/13
 * Time: 17:05
 */

function unique($arr)
{
    $map = array();
    $result = array();

    foreach (array_reverse($arr) as $x){
        if(!array_key_exists($x, $map)){
            $map[$x] = true;
            $result[] = $x;
        }
    }

    return array_reverse($result);
}


function main()
{
    $n = intval(fgets(STDIN));
    $arr = array();

    for($i=0; $i<$n-1; $i++){
        $arr[] = intval(stream_get_line(STDIN, 4096, " "));
    }
    $arr[] = intval(stream_get_line(STDIN, 4096, "\n"));

    $unique_arr = unique($arr);

    echo count($unique_arr)."\n";
    foreach ($unique_arr as $x){
        echo $x.' ';
    }
}

main();