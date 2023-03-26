class Solution {

    function depth($root, $curr){
        if($root == null) return $curr-1;
        return max($this->depth($root->left, $curr+1), $this->depth($root->right, $curr+1));
    }
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        return $this->depth($root, 1);
    }
}