class Solution {
    function BST($root, $low, $high){
        if($root == null) return 0;
        $l = $this->BST($root->left, $low, $high);
        $r = $this->BST($root->right, $low, $high);
        $p = $root->val>=$low && $root->val<=$high ? $root->val:0; 
        return $p + $l + $r; 
    }
    /**
     * @param TreeNode $root
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function rangeSumBST($root, $low, $high) {
        return $this->BST($root, $low, $high);
    }
}