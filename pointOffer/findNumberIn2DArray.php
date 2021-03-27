<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray($matrix, $target) {
        if (empty($matrix)) {
            return false;
        }

        $rowLength = count($matrix);
        $columnLength = count($matrix[0]);
        $row = $rowLength - 1;
        $column = 0;
        while ($row >= 0 && $column < $columnLength) {
            if ($matrix[$row][$column] > $target) {
                $row--;
            } else if ($matrix[$row][$column] < $target) {
                $column++;
            } else {
                return true;
            }
        }

        return false;
    }
}

$arr = [
    [1,   4,  7, 11, 15],
    [2,   5,  8, 12, 19],
    [3,   6,  9, 16, 22],
    [10, 13, 14, 17, 24],
    [18, 21, 23, 26, 30]
];
// $arr = [[-1,3]];
$solution = new Solution;
$r = $solution->findNumberIn2DArray($arr, 3);
var_dump($r);