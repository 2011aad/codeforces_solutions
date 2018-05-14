<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/13
 * Time: 18:32
 */

function minChange($arr)
{
    if(count($arr) < 3){
        return 0;
    }

    $min_count = count($arr) + 1;

    foreach ([-1, 0, 1] as $i){
        foreach ([-1, 0, 1] as $j){
            $first = $arr[0] + $i;
            $second = $arr[1] + $j;

            $counter = 0;

            if($i != 0) $counter++;
            if($j != 0) $counter++;

            $diff = $second - $first;

            $cur = $second;
            $flag = true;
            for($k=1; $k<count($arr)-1; $k++){
                if(($cur + $diff == $arr[$k+1])
                    || ($cur + $diff == $arr[$k+1] - 1)
                    || ($cur + $diff == $arr[$k+1] + 1)){

                    if(!($cur + $diff == $arr[$k+1])){
                        $counter++;
                    }
                    $cur += $diff;
                }
                else{
                    $flag = false;
                    break;
                }
            }

            if($flag){
                $min_count = min($min_count, $counter);
            }
        }
    }

    if($min_count == count($arr) + 1) return -1;
    return $min_count;
}


function main()
{
    $n = intval(fgets(STDIN));
    $arr = array();
    for($i=0; $i<$n-1; $i++){
        $arr[] = intval(stream_get_line(STDIN, 4096, " "));
    }
    $arr[] = intval(stream_get_line(STDIN, 4096, "\n"));

    echo minChange($arr)."\n";
}


main();