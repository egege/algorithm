<?php

/**
 * 110. 平衡二叉树
 * 
 * https://leetcode-cn.com/problems/balanced-binary-tree/
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

    function height($root)
    {
        if ($root === null) {
            return 0;
        }

        return 1 + max($this->height($root->left), $this->height($root->right));
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced1($root) {
        if ($root === null) {
            return true;
        }

        return abs($this->height($root->left) - $this->height($root->right)) < 2
            && $this->isBalanced1($root->left)
            && $this->isBalanced1($root->right);
    }

    private $notBalanced = false;

     /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        return $this->heightOrIsBalanced($root) !== $this->notBalanced;
    }


    function heightOrIsBalanced($root) 
    {
        if ($root === null) {
            return 0;
        }

        $leftInfo = $this->heightOrIsBalanced($root->left);
        if ($leftInfo === $this->notBalanced) {
            return $this->notBalanced;
        }

        $rightInfo = $this->heightOrIsBalanced($root->right);
        if ($rightInfo === $this->notBalanced) {
            return $this->notBalanced;
        }

        if (abs($leftInfo - $rightInfo) > 1) {
            return $this->notBalanced;
        }

        return max($leftInfo, $rightInfo) + 1;
    }

}