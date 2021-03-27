<?php
/**
 * 144. 二叉树的前序遍历
 * https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
 * 
 * https://blog.csdn.net/zhangxiangdavaid/article/details/37115355
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
    private $preorder = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversalRecursion($root) {
        if ($root !== null) {
            $this->preorder[] = $root->val;
            $this->preorderTraversalRecursion($root->left);
            $this->preorderTraversalRecursion($root->right);
        }

        return $this->preorder;
    }

     /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $result = [];
        if ($root === null) {
            return $result;
        }
        $stack = [];
        $current = $root;

        while(!empty($stack) || $current) {
            if ($current) {
                $result[] = $current->val;
                $stack[] = $current;
                $current = $current->left;
            } else {
                $current = array_pop($stack);
                $current = $current->right;
            }
        }

        return $result;
    }
}