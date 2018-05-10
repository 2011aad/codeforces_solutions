<?php
/**
 * Created by PhpStorm.
 * User: jianzjzhang
 * Date: 2018/5/9
 * Time: 13:52
 */

function canPlace($city_width, $hotels)
{
    if($hotels < 0 || $hotels > 2*($city_width-2)){
        return false;
    }
    return true;
}

function printCity($city)
{
    for($i=0; $i<4; $i++){
        echo implode("", $city[$i])."\n";
    }
}

function placeHotels($city_width, $hotels)
{
    $city = array();
    for($i=0; $i<4; $i++){
        for($j=0; $j<$city_width; $j++){
            $city[$i][] = '.';
        }
    }

    if($hotels === 0){
        printCity($city);
        return;
    }

    $mid = intval($city_width / 2);

    $city[1][$mid] = '#';
    $hotels--;
    for($i=1; $mid-$i>0; $i++){
        if($hotels>=2){
            $city[1][$mid-$i] = '#';
            $city[1][$mid+$i] = '#';
            $hotels -= 2;
        }
        else{
            break;
        }
    }

    if($hotels === 0){
        printCity($city);
        return;
    }

    if($hotels%2 !== 0){
        $city[2][$mid] = '#';
        $hotels--;
    }
    for($i=1; $mid-$i>0; $i++){
        if($hotels>=2){
            $city[2][$mid-$i] = '#';
            $city[2][$mid+$i] = '#';
            $hotels -= 2;
        }
        else{
            break;
        }
    }

    printCity($city);
}


function main()
{
    $data = fread(STDIN, 4096);
    list($width, $k) = explode(" ", $data);
    if(canPlace(intval($width), intval($k))){
        echo "YES\n";
        placeHotels(intval($width), intval($k));
    }
    else{
        echo "NO\n";
    }

}

main();