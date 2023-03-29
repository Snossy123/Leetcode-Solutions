class Solution {
    /**
     * @param Node $root
     * @return integer
     */
    function maxDepth($root) {
    	if(!$root) return 0;
    	if(!$root->children) return 1;
        $temp = [];
        for($i=0;$i<count($root->children);$i++){ 
            $temp[] = $this->maxDepth($root->children[$i]);
        }
        return 1 + max($temp);
    }
}