class Solution {
    private $ans=[];
    function preO($r){
        if(!$r)return;
        $this->ans[] = $r->val;
        for($i=0;$i<count($r->children);$i++){
            $this->preO($r->children[$i]);
        }
    }
    /**
     * @param Node $root
     * @return integer[]
     */
    function preorder($root) {
        $this->preO($root);
        return $this->ans;
    }
}