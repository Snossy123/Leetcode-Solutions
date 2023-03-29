class Solution {
    private $ans=true;
    function solve($root, $v){
        if(!$root) return;
        if($root->val != $v) {$this->ans = false; return;}
        $this->solve($root->left, $v); $this->solve($root->right, $v);
    }
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isUnivalTree($root) {
        $this->solve($root, $root->val); return $this->ans;
    }
}