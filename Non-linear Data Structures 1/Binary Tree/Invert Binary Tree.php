class Solution {
    function Tree($root){
        if(!$root) return $root;
        $l = $this->Tree($root->left);
        $r = $this->Tree($root->right);
        $root->left = $r;
        $root->right = $l;
        return $root;
    }
    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        return $this->Tree($root);
    }
}