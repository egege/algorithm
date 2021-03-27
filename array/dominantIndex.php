<?php
// 747  
function dominantIndex($nums) {
    $notExist = -1;
    if (empty($nums)) {
        return $notExist;
    }
    if (count($nums) == 1) {
        return 0;
    }

    $max = 0;
    $maxIndex = 0;
    $secondMax = 0;
    foreach ($nums as $k => $num) {
        if ($num > $max) {
            $secondMax = $max;
            $max = $num;
            $maxIndex = $k;
        } else if ($num > $secondMax) {
            $secondMax = $num;
        }
    }

    return $max >= 2 * $secondMax ? $maxIndex : $notExist;
}

// $nums = [1, 2, 3, 4];
$nums = [3, 6, 1, 0];
$r= dominantIndex($nums);
var_dump($r);

