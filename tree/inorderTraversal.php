<?php
/**
 * 94. 二叉树的中序遍历
 * https://leetcode-cn.com/problems/binary-tree-inorder-traversal/
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

    /**
     * 中序遍历返回数组
     *
     * @var array
     */
    private $inorder = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversalRecursion($root) {
        if ($root !== null) {
            $this->inorderTraversalRecursion($root->left);
            $this->inorder[] = $root->val;
            $this->inorderTraversalRecursion($root->right);
        }

        return $this->inorder;
    }

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $result = [];
        if ($root === null) {
            return $result;
        }
        $stack = [];
        $current = $root;

        while (!empty($stack) || $current) {
            if ($current) {
                $stack[] = $current;
                $current = $current->left; 
            } else {
                $current = array_pop($stack);
                $result[] = $current->val;
                $current = $current->right;
            }
        }

        return $result;
    }
}