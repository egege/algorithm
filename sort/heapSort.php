<?php

// 堆排序
// https://www.cnblogs.com/chengxiao/p/6129630.html
function heapSort($arr)
{
    global $len;
    $len = count($arr);
    buildMaxHeap($arr);
    $arrLength = count($arr);
    for ($i = $arrLength - 1; $i > 0; $i--) {
        swap($arr, 0, $i);
        $len--;
        heapify($arr, 0);
    }

    return $arr;
}

function buildMaxHeap(&$arr)
{
    global $len;
    for ($i = floor($len / 2); $i >= 0; $i--) {
        heapify($arr, $i);
    }
}

function heapify(&$arr, $i)
{
    global $len;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $largest = $i;
    
    if ($left < $len && $arr[$left] > $arr[$largest]) {
        $largest = $left;
    }

    if ($right < $len && $arr[$right] > $arr[$largest]) {
        $largest = $right;
    }

    if ($largest != $i) {
        swap($arr, $i, $largest);
        heapify($arr, $largest);
    }
}

function swap(&$arr, $i, $j) 
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

$arr = [2, 1, 7, 4, 6, 3];
$arr = heapSort($arr);
print_r($arr);