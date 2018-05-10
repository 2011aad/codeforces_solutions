<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/10
 * Time: 10:36
 */

function mapping($arr, $k)
{
    $map = array();
    $map = array_pad($map, 256, -1);
    $dp = array();
    $dp = array_pad($dp, 256, -1);
    $result = array();

    foreach ($arr as $x){
        if($map[$x] != -1){
            $result[] = $map[$x];
        }
        else{
            $start = $x - $k + 1;
            if($start < 0){
                $start = 0;
            }
            if($map[$start] != -1 && $start != 0 && $map[$start-1] == $map[$start]){
                $start = $dp[$start] + 1;
            }
            $result[] = $start;
            for($i=$start; $i<=$x; $i++){
                $map[$i] = $start;
                $dp[$i] = $x;
            }
        }
    }
    return $result;
}

function main()
{
    list($n, $k) = explode(" ", fgets(STDIN));
    $arr = array();
    for($i=0; $i<$n-1; $i++){
        $arr[] = intval(stream_get_line(STDIN, 4, " "));
    }
    $arr[] = intval(stream_get_line(STDIN, 4, "\n"));

    echo implode(" ", mapping($arr, intval($k)));
}

main();