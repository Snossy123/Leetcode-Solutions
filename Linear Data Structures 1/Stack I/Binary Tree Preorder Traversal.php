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
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public $res = [];
    function preorder($root){
        if($root==null){
            return;
        }
        $this->$res[] = $root->val;
        $this->preorder($root->left);
        $this->preorder($root->right);

    }
    function preorderTraversal($root) {
        $this->preorder($root); 
        $ans = [];
        foreach($this->$res as $i){
            $ans[]=$i;
        }
        return $ans;
    }
}