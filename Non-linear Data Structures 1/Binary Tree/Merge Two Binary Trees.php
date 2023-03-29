class Solution { 
    function travel(&$r1, $r2){
        if(!$r1 && !$r2) return null;
        if($r1 && !$r2) return $r1;
        if(!$r1 && $r2) return $r2;
        $r1->left = $this->travel($r1->left, $r2->left);
        $r1->right = $this->travel($r1->right, $r2->right);
        $r1->val = $r1->val+$r2->val;
        return $r1;
    }
    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees($root1, $root2) { 
        if(!$root1)return $root2;
        if(!$root2)return $root1;
        $this->travel($root1, $root2);
        return $root1;
    }
}