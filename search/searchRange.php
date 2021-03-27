<?php
// 34. 在排序数组中查找元素的第一个和最后一个位置

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $left = $this->searchRangeLeft($nums, $target);
        $right = $this->searchRangeRight($nums, $target);

        return [$left, $right];
    }

    private function searchRangeLeft($nums, $target) {
        if (empty($nums)) {
            return -1;
        }

        $left = 0;
        $right = count($nums) - 1;

        while($left <= $right) {
            $mid = floor(($left + $right) / 2);
            if ($nums[$mid] < $target) {
                $left = $mid + 1;
            } else if ($nums[$mid] > $target) {
                $right = $mid - 1;
            } else {
                $right = $mid - 1;
            }
        }

        if ($left >= count($nums) || $nums[$left] != $target) {
            return -1;
        }

        return $left;
    }

    private function searchRangeRight($nums, $target) {
        if (empty($nums)) {
            return -1;
        }

        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);
            if ($nums[$mid] > $target) {
                $right = $mid - 1;
            } else if ($nums[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $left = $mid + 1;
            }
        }

        if ($right < 0 || $nums[$right] != $target) {
            return -1;
        }

        return $right;
    }
}

$arr = [5,7,7,8,8,10];
$target = 8;
$solution = new Solution();
$r = $solution->searchRange($arr, $target);
var_dump($r);