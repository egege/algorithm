<?php
// 56
// usort 调用的用户函数的返回值需要int，否则会强制转化为int，0.99与0.1都会转为0
// php7 飞碟符号<=>
// max函数
// 数组函数end/current/key/next

function merge($intervals) {
    if (!$intervals || count($intervals) == 1) {
        return $intervals;
    }
    usort($intervals, function($interval1, $interval2) {
        return $interval1[0] <=> $interval2[0];
    });

    $merged[] = $intervals[0];
    for($i = 1; $i < count($intervals); $i++) {
        end($merged);
        $preInterval = &$merged[key($merged)];
        $interval = $intervals[$i];
        if ($preInterval[1] < $interval[0]) {
            $merged[] = $interval;
        } else {
            $preInterval[1] = max($preInterval[1], $interval[1]);
        }
    }

    return $merged;
}

$intervals = [[1,3],[2,6],[8,10],[15,18]];
// $intervals = [[2,6],[1,3],[15,18],[8,10]];
// $intervals = [[1.3,6],[1.1,3],[15,18],[8,10]];


$expected = [[1,6],[8,10],[15,18]];
$r = merge($intervals);
print_r($r);