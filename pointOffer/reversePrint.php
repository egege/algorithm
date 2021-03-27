<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function reversePrint($head) {
        if (empty($head)) {
            return [];
        }

        $current = $head;
        $stash = [];
        while ($current) {
            $stash[] = $current->val;
            $current = $current->next;
        }

        return array_reverse($stash);
    }

    private $reversePrintArray = [];

    function reversePrintRecursive($current) {
        if ($current) {
            $this->reversePrintArray[] = $current->val;
            $this->reversePrintRecursive($current->next);
        }

        return array_reverse($this->reversePrintArray);
    }
}