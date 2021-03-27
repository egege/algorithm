<?php
// 35
function searchInsert($nums, $target) {
    $left = 0;
    $right = count($nums) - 1;
    while($left <= $right) {
        $middle = (int)(($left + $right) / 2);
        $middleValue = $nums[$middle];
        if ($middleValue > $target) {
            $right = $middle - 1;
        } else if ($middleValue == $target){
            return $middle;
        } else {
            $left = $middle + 1;
        }
    }

    return $left;
}

$nums = [1,3,5,6];
$target = -1;
$r = searchInsert($nums, $target);
var_dump($r);