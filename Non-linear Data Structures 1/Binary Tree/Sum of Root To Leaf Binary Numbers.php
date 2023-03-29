class Solution {
    private $ans=0;
    function RTL($root, $curr){ 
        if(!$root->left && !$root->right) { $this->ans+=bindec($curr . $root->val); return;}
        if($root->left)     $this->RTL($root->left, $curr . $root->val);
        if($root->right)    $this->RTL($root->right, $curr . $root->val);
    }
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumRootToLeaf($root) {
        $this->RTL($root, "");  return $this->ans;
    }
}