<?php

function bubbleSort(&$arr) {
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return;
    }

    for ($bubbledNum = 0; $bubbledNum < $length - 1; $bubbledNum++) {
        for ($j = 1; $j < $length - $bubbledNum; $j++) {
            if ($arr[$j] < $arr[$j - 1]) {
                [$arr[$j], $arr[$j - 1]] = [$arr[$j - 1], $arr[$j]];
            }
        }
    }
}

function selectSort(&$arr) {
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return;
    }

    for ($selectedNum = 0; $selectedNum < $length - 1; $selectedNum++) {
        $minIndex = $selectedNum;
        for ($j = $selectedNum + 1; $j < $length; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }

        if ($minIndex != $selectedNum) {
            // to do exchange
        }
    }
}

function insertSort(&$arr) {
    $length = count($arr);
    if (empty($arr) || $length == 1) {
        return;
    }

    // for ($i = 0; $i <)
}