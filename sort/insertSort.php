<?php
function insertSort(&$arr)
{
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return $arr;
    }

    for ($insertNumIndex = 1; $insertNumIndex < $length; $insertNumIndex++) {
        $insertNum = $arr[$insertNumIndex];
        for ($j = $insertNumIndex - 1; $j >= 0 && $arr[$j] > $insertNum; $j--) {
            $arr[$j + 1] = $arr[$j];
        }
        $arr[$j + 1] = $insertNum;
    }
}

function insertSortBinarySearch(&$arr)
{
    $length = count($arr);
    if (empty($arr) || $length ==  1) {
        return $arr;
    }

    for ($insertNumIndex = 1; $insertNumIndex < $length; $insertNumIndex++) {
        $insertNum = $arr[$insertNumIndex];
        $insertIndex = searchInsertIndex($arr, $insertNum, $insertNumIndex);
        for ($j = $insertNumIndex - 1; $j >= $insertIndex; $j--) {
            $arr[$j + 1] = $arr[$j];
        }
        $arr[$insertIndex] = $insertNum;
    }
}

function searchInsertIndex(&$arr, $target, $sortedNums)
{
    $left = 0;
    $right = $sortedNums - 1;
    while ($left <= $right) {
        $mid = (int) (($left + $right) / 2);
        if ($arr[$mid] > $target) {
            $right = $mid - 1;
        }
        // else if ($arr[$mid] == $target) {
        //     return $mid;
        // } 
        else {
            $left = $mid + 1;
        }
    }

    // print_r([$left, $mid, $right]);

    return $left;
}

$arr = [2, 1, 4, 4, 4, 7, 4, 6, 3, 5];
// insertSort($arr);
insertSortBinarySearch($arr);
print_r($arr);