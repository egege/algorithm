<?php
// 66
function plusOne($digits) {
    for($i = count($digits) - 1; $i >= 0; $i--) {
        if ($digits[$i] < 9) {
            $digits[$i]++;
            return $digits;
        }
        $digits[$i] = 0;
    }
    array_unshift($digits, 1);
    return $digits;
}

// function plusOne($digits) {
//     $num = implode('', $digits);
//     $num ++;
//     $str = number_format($num, 0, '', '');
//     return str_split($str);
// }

// $arr1 = [1,2,3];
$arr1 = [9, 9, 9];
// $arr2 = [4,3,2,1];
$r1 = plusOne($arr1);
// $r2 = plusOne($arr2);
var_dump($r1);
