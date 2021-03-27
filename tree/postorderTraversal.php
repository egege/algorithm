<?php
/**
 * 145. 二叉树的后序遍历
 * https://leetcode-cn.com/problems/binary-tree-postorder-traversal/
 * 
 * https://blog.csdn.net/zhangxiangdavaid/article/details/37115355
 * https://leetcode-cn.com/problems/binary-tree-postorder-traversal/solution/die-dai-jie-fa-shi-jian-fu-za-du-onkong-jian-fu-za/
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {
    private $postorder = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversalRecursion($root) {
        if ($root !== null) {
            $this->postorderTraversalRecursion($root->left);
            $this->postorderTraversalRecursion($root->right);
            $this->postorder[] = $root->val; 
        }

        return $this->postorder;
    }

    /** 
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $result = [];
        if ($root === null) {
            return $result;
        }
        $stack = [];
        $current = $root;

        while (!empty($stack) || $current) {
            if ($current) {
                array_unshift($result, $current->val);
                $stack[] = $current;
                $current = $current->right;
            } else {
                $current = array_pop($stack);
                $current = $current->left;
            }
        }

        return $result;
    }
}