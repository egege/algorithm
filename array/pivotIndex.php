<?php
// 724
function pivotIndex($nums) {
    $notExist = -1;
    if (empty($nums)) {
        return $notExist;
    }
    $sumAll = array_sum($nums);
    
    $sumLeft = 0;
    foreach ($nums as $k => $num) {
        $sumRight = $sumAll - $sumLeft - $num;
        if ($sumRight == $sumLeft) {
            return $k;
        }

        $sumLeft += $num;
    }

    return $notExist;
}

$arr = [1, 7, 3, 6, 5, 6];
var_dump(pivotIndex($arr));
$arr = [1, 2, 3];
var_dump(pivotIndex($arr));