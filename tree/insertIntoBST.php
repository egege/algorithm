<?php
// 701. 二叉搜索树中的插入操作
// https://leetcode-cn.com/problems/insert-into-a-binary-search-tree/


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBSTRecur($root, $val) {
        if ($root === null) {
            return new TreeNode($val);
        }

        if ($val > $root->val) {
            $root->right = $this->insertIntoBSTRecur($root->right, $val);
        } else {
            $root->left = $this->insertIntoBSTRecur($root->left, $val);
        }

        return $root;
    }

     /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {
        if (is_null($root)) {
            return new TreeNode($val);
        }

        $node = $root;
        while (!is_null($node)) {
            if ($val > $node->val) {
                if (is_null($node->right)) {
                    $node->right = new TreeNode($val);
                    return $root;
                } else {
                    $node = $node->right;
                }
            } else {
                if (is_null($node->left)) {
                    $node->left = new TreeNode($val);
                    return $root;
                } else {
                    $node = $node->left;
                }
            }
        }

        return $root;
    }
}