<?php
/**
 * 28. 实现 strStr()
 * https://leetcode-cn.com/problems/implement-strstr/
 * 
 * https://blog.csdn.net/chndata/article/details/43792363
 * https://blog.csdn.net/paincupid/article/details/81159320
 */
class Solution {

    /**
     * Brute-Force算法
     * @param String $haystack 
     * @param String $needle
     * @return Integer
     */
    function strStr1($haystack, $needle) {
        if (empty($needle)) {
            return 0;
        }

        $lengthHaystack = mb_strlen($haystack);
        $lengthNeedle =  mb_strlen($needle);
        $index = -1;

        for ($i = 0; $i < $lengthHaystack - $lengthNeedle; $i++) {
            $match = true;
            for ($j = 0; $j < $lengthNeedle; $j++) {
                if ($haystack[$i + $j] != $needle[$j]) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                $index = $i;
            }
        }

        return $index;
    }

    /**
     * RK算法
     * @param String $haystack 
     * @param String $needle
     * @return Integer
     */
    public function strStr2($haystack, $needle) {
        if (empty($needle)) {
            return 0;
        }

        $lengthHaystack = mb_strlen($haystack);
        $lengthNeedle = mb_strlen($needle);
        $hashNeedle =  crc32($needle);
        $index = -1;

        for ($i = 0; $i < $lengthHaystack - $lengthNeedle; $i++) {
            $checkStr = mb_strcut($haystack, $i, $lengthNeedle);
            if ($hashNeedle == crc32($checkStr) && $needle === $checkStr) {
                $index = $i;
                break;
            } 
        }

        return $index;
    }

    /**
     * Boyer-Moore算法
     * @param String $haystack 
     * @param String $needle
     * @return Integer
     */
    public function strStr3($haystack, $needle) {
        if (empty($needle)) {
            return 0;
        }
    }

    /**
     * Sunday算法
     * @param String $haystack 
     * @param String $needle
     * @return Integer
     */
    public function strStr4($haystack, $needle) {
        if (empty($needle)) {
            return 0;
        }

        $lengthHaystack = mb_strlen($haystack);
        $lengthNeedle = mb_strlen($needle);
        $loop = 1;
        for ($i = 0; $i <= $lengthHaystack - $lengthNeedle; $i += $loop) {
            // 暴力匹配
            $isMatch = true;
            for ($j = 0; $j < $lengthNeedle; $j++) {
                if ($needle[$j] !== $haystack[$i + $j]) {
                    $isMatch = false;
                    break;
                }
            }
            if ($isMatch) {
                return $i;
            }

            //查找下一个字符，是否在模式串里
            $isExist = false;
            for ($k = $lengthNeedle - 1; $k >= 0; $k--) {
                if ($needle[$k] === $haystack[$i + $lengthNeedle]) {
                    $isExist = true;
                    break;
                }
            }

            if ($isExist) {//存在则对齐
                $loop = $lengthNeedle - $k;
            } else {//不存在则跳过下一个字符串
                $loop = $lengthNeedle + 1;
            }
        }

        return -1;
    }

     /**
     * KMP算法
     * @param String $haystack 
     * @param String $needle
     * @return Integer
     */
    public function strStr($haystack, $needle) {
        if (empty($needle)) {
            return 0;
        }

        $next = $this->buildNext($needle);
        $lengthNeedle = mb_strlen($needle);
        $lengthHaystack = mb_strlen($haystack);
        $target = 0;
        $pos = 0;

        while ($target < $lengthHaystack) {
            if ($haystack[$target] == $needle[$pos]) {
                $target++;
                $pos++;
            } else {
                if ($pos != 0) {
                    $pos = $next[$pos - 1];
                } else {
                    $target++;
                }
            }

            if ($pos === $lengthNeedle) {
                return $target - $pos;
                // $pos = $next[$pos - 1];
            }
        }

        return -1;
    }

    private function buildNext($needle) 
    {
        $i = 1;
        $now = 0;
        $lengthNeedle = mb_strlen($needle);
        // $next = [];
        $next = array_fill(0, $lengthNeedle - 1, 0);
        while ($i < $lengthNeedle) {
            if ($needle[$i] == $needle[$now]) {
                $now++;
                $next[$i] = $now;
                $i++;
            } else {
                if ($now != 0) {
                    $now = $next[$now - 1];
                } else {
                    $next[$i] = $now;
                    $i++;
                }
            }
        }

        return $next;
    }
}

$haystack =  "hello";
$needle = "ll";
$solution = new Solution();
$r = $solution->strStr($haystack, $needle);
var_dump($r);