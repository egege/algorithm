<?php
/**
 * https://leetcode-cn.com/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof/
 * 剑指 Offer 03. 数组中重复的数字
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findRepeatNumber1($nums) {
        $length = count($nums);
        if (empty($nums) || $length == 1) {
            return null;
        }
        $findArr = [];
        foreach ($nums as $num) {
            if (empty($findArr[$num])) {
                $findArr[$num] = 1;
            } else {
                return $num;
            }
        }

        return null;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findRepeatNumber2($nums) {
        $length = count($nums);
        if (empty($nums) || $length == 1) {
            return null;
        }

        $i = 0;
        while ($i < $length) {
            if ($nums[$i] != $i) {
                if ($nums[$i] == $nums[$nums[$i]]) {
                    return $nums[$i];
                } else {
                    // 这样是不行的，因为$nums[$i]先发生替换，后面的替换会影响
                    // [$nums[$i], $nums[$nums[$i]]] = [$nums[$nums[$i]], $nums[$i]];

                    // [$nums[$nums[$i]], $nums[$i]] = [$nums[$i], $nums[$nums[$i]]];
                    $this->swap($nums, $i, $nums[$i]);
                }
            } else {
                $i++;
            }
        }

        return null;
    }

    function swap(&$arr, $i, $j)
    {
        [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findRepeatNumber($nums) {
        $length = count($nums);
        if (empty($nums) || $length == 1) {
            return null;
        }

        for ($i = 0; $i < $length; $i++) {
            while ($nums[$i] != $i) {
                if ($nums[$i] == $nums[$nums[$i]]) {
                    return $nums[$i];
                }
                [$nums[$nums[$i]], $nums[$i]] = [$nums[$i], $nums[$nums[$i]]];
            }
        }

        return null;
    }
}
$arr = [2, 3, 1, 0, 2, 5, 3];
$solution = new Solution;
$r = $solution->findRepeatNumber($arr);
var_dump($r);