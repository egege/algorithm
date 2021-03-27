<?php
//141. 环形链表

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
     * @return Boolean
     */
    function hasCycleHash($head) {
        $current = $head;
        $hashArray = [];
        while ($current !== null) {
            $id = spl_object_id($current);
            if ($hashArray[$id] === null) {
                $hashArray[$id] = $current;
                $current = $current->next;
            } else {
                if ($hashArray[$id] === $current) {
                    return true;
                }
            }
        }

        return false;
    }


    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $fast = $head;
        $slow = $head;

        if ($fast === null || $fast->next === null) {
            return false;
        }

        while ($fast !== null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
            if ($fast === $slow) {
                return true;
            }
        }

        return false;
    }
}