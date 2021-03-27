<?php
// 206. 反转链表

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
     * @return ListNode
     */
    function reverseList($head) {
        $prev = null;
        $current = $head;
        while ($current) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        return $current;
    }

    function reverseListRecursive($head)
    {
        if ($head === null || $head->next === null) {
            return $head;
        }
        
        $last = $this->reverseListRecursive($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $last;
    }
}