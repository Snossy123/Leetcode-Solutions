class Solution {
    private $ans = 0;
    function tilt($root){
        if($root == null) return 0;
        $left = $this->tilt($root->left);
        $right = $this->tilt($root->right);
        $this->ans += abs($left -  $right); 
        return $left + $root->val + $right; 
    }
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function findTilt($root) {
        $this->tilt($root);
        return $this->ans;
    }
}