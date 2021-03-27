<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        if (empty($nums)) {
            return -1;
        }

        $minIndex = 0; 
        $maxIndex = count($nums) - 1;
        
        while ($minIndex <= $maxIndex) { //数组一个元素时，使用等于号
            // $middleIndex = floor(($maxIndex + $minIndex) / 2);
            $middleIndex = $minIndex + floor(($maxIndex - $minIndex) / 2);

            if ($nums[$middleIndex] == $target) {
                return $middleIndex;
            } else if ($nums[$middleIndex] > $target) {
                $maxIndex = $middleIndex - 1;
            } else {
                $minIndex = $middleIndex + 1;
            }
        }

        return -1;
    }
}

$arr = [-1,0,3,5,9,12];
$target = 9;
$solution = new Solution();
$r = $solution->search($arr, $target);
var_dump($r);