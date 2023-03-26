class Solution {
    private $ans = 100003;
    private $prev = -1;
    function BST($root){
        if(!$root) return;
        $this->BST($root->left);
        if($this->prev>=0)
            $this->ans = min($this->ans, $root->val - $this->prev);
        $this->prev = $root->val;
        $this->BST($root->right);
    }
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDiffInBST($root) {

        $this->BST($root);
        return $this->ans;
    }
}