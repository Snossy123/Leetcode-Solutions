class Solution {

    private $result = [];
    function inBST($root){
        if($root == null) return;
        $this->inBST($root->left);
        $this->result[] = $root->val; 
        $this->inBST($root->right); 
    }
    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function increasingBST($root) {
        $this->inBST($root);
        sort($this->result);
        $ans = null;
        for($i=count($this->result)-1; $i>=0; $i--){
          if($ans == null){$ans = new TreeNode($this->result[$i]);}
          else{$ans = new TreeNode($this->result[$i], null, $ans);}
        } 
        return $ans;
    }
}