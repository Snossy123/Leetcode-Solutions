class Solution {
    function balan($root){
        if(!$root) return 0;
        $l = $this->balan($root->left);
        $r = $this->balan($root->right);
        if($l == -1 || $r == -1)return -1;
        if(abs($l - $r) > 1)return -1;
        return max($l, $r)+1;
    } 
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) { 
        if(!$root)return true;
        return $this->balan($root)==-1?false:true;
    }
}