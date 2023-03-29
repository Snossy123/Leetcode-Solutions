class Solution {
    private $leafs=[];
    function leaf($r){
        if(!$r) return;
        if(!$r->left && !$r->right) {$this->leafs[] = $r->val; return;}
        $this->leaf($r->left); 
        $this->leaf($r->right); 
    }
    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2) {
        $this->leaf($root1);
        $T1 = $this->leafs;
        $this->leafs = [];
        $this->leaf($root2);
        $T2 = $this->leafs; 
        for($i=0; $i<min(count($T1),count($T2)); $i++){if($T1[$i] != $T2[$i])return false;}
        return count($T1)!=count($T2)?false:true;
    }
}