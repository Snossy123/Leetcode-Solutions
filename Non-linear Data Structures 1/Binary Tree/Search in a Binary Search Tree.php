class Solution {
    function BST($r, $v){
        if(!$r) return null;
        if($r->val == $v)return $r;
        else if($r->val > $v) return $this->BST($r->left, $v);
        else return $this->BST($r->right, $v);
    }
    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val) {
        return $this->BST($root, $val);
    }
}