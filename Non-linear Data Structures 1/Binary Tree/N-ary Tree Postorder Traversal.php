class Solution {
    private $ans=[];
    function postO($root){
        if(!$root) return;
        for($i=0; $i<count($root->children); $i++){
            $this->postO($root->children[$i]);
        }
        $this->ans[] = $root->val;
    }
    /**
     * @param Node $root
     * @return integer[]
     */
    function postorder($root) {
        $this->postO($root);
        return $this->ans;
    }
}