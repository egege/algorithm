<?php
// 剑指 Offer 40. 最小的k个数
// https://leetcode-cn.com/problems/zui-xiao-de-kge-shu-lcof/

// https://www.php.net/manual/zh/class.splmaxheap.php
// https://leetcode-cn.com/problems/zui-xiao-de-kge-shu-lcof/solution/tu-jie-top-k-wen-ti-de-liang-chong-jie-fa-you-lie-/

class Solution {

    /**
     * 使用大顶堆
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbersMaxHeap($arr, $k) {
        if($k === 0) {
            return [];
        }
        $lengthArr = count($arr);
        if ($k >= $lengthArr) {
            return $arr;
        }

        $maxHeap = new MaxHeap();
        foreach ($arr as $num) {
            if ($maxHeap->count() < $k || $num < $maxHeap->top()) {
                $maxHeap->insert($num);
            }

            if ($maxHeap->count() > $k) {
                $maxHeap->extract();
            }
        }

        $result = [];
        foreach($maxHeap as $num) {
            $result[] = $num;
        }

        return $result;
    }

    /**
     * 使用快速排序变种
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbers($arr, $k) {
        if ($k == 0) {
            return [];
        }
        $arrLength = count($arr);
        if ($arrLength <= $k) {
            return $arr;
        }

        $this->partitionArray($arr, 0, $arrLength - 1, $k);
        return array_slice($arr, 0, $k);
    }

    /**
     * 分治法判断数组
     *
     * @param array $arr 数组
     * @param integer $left 最小的下标
     * @param integer $right 最大的下标
     * @param integer $k 需要最小的k个数
     * @return void
     */
    function partitionArray(&$arr, $left, $right, $k) {
        $pivot = $this->partition($arr, $left, $right);
        if ($k == $pivot) {
            return;
        } else if ($k < $pivot) {
            $this->partitionArray($arr, $left, $pivot - 1, $k);
        } else if ($k > $pivot){
            $this->partitionArray($arr, $pivot + 1, $right, $k);
        }
    }

    /**
     * 使得数组两边以分制中心点分隔，返回分制中心点下标
     *
     * @param array $arr
     * @param integer $left
     * @param integer $right
     * @return integer
     */
    function partition(&$arr, $left, $right) {
        $pivot = $left;
        $index = $left + 1;
        for ($i = $index; $i <= $right; $i++) {
            if ($arr[$i] < $arr[$pivot]) {
                $this->swap($arr, $i, $index);
                $index++;
            }
        }
        $this->swap($arr, $pivot, $index - 1);

        return $index - 1;
    }

    /**
     * 交换数据
     *
     * @param [type] $arr
     * @param [type] $i
     * @param [type] $j
     * @return void
     */
    function swap(&$arr, $i, $j) {
        if ($i != $j) {
            [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
        }
    }
}

class MaxHeap extends SplMaxHeap
{
    public function compare($val1, $val2)
    {
        return ($val1 - $val2);
    }
}