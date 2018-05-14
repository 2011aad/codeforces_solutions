<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/13
 * Time: 17:45
 */

function transformDorm($room_number, $letter_number)
{
    $current_dorm = 1;
    $reduced = 0;

    $result = array();

    for($i=0; $i<count($letter_number); $i++){
        $x = $letter_number[$i];

        if($x - $reduced <= $room_number[$current_dorm-1]){
            $result[] = $current_dorm;  //push f -- the dormitory number
            $result[] = $x - $reduced;  //push k -- the room number
        }
        else{
            $reduced += $room_number[$current_dorm-1];
            $current_dorm++;
            $i--;
        }
    }

    return $result;
}

function printResult($arr)
{
    $i = 0;
    while($i < count($arr)){
        echo $arr[$i++].' '.$arr[$i++]."\n";
    }
}


function main()
{
    list($n, $m) = explode(" ", stream_get_line(STDIN, 4096, "\n"));

    $room_number = array();
    $letter_number = array();
    for($i=0; $i<intval($n)-1; $i++){
        $room_number[] = stream_get_line(STDIN, 4096, " ");
    }
    $room_number[] = stream_get_line(STDIN, 4096, "\n");

    for($i=0; $i<intval($m)-1; $i++){
        $letter_number[] = stream_get_line(STDIN, 4096, " ");
    }
    $letter_number[] = stream_get_line(STDIN, 4096, "\n");

    printResult(transformDorm($room_number, $letter_number));
}

main();