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
    public $res=[];
    function inorder($root){
        if($root == null)
            return; 
        $this->inorder($root->left); 
        $this->$res[] = $root->val; 
        $this->inorder($root->right);        
    }
    function inorderTraversal($root) {
        $this->inorder($root); 
        $ans = [];
        foreach($this->$res as $i){
            $ans[] = $i;
        } 
        return $ans;
    }
}