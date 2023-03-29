class Solution {

    /**
     * @param TreeNode $root
     * @return Float[]
     */
    function averageOfLevels($root) {
        $node = $root;
        $que = [$node];
        $data = [];
        while(!empty($que)){
            $level = [];
            $n = count($que);
            for($i=0; $i<$n; $i++){
                $node = array_shift($que); 
                if($node){
                    $level[] = $node->val;
                    $que[]= $node->left;
                    $que[]= $node->right;
                }
            }
            if(count($level)) $data[] = $level;
        }
        $ans = []; 
	for($i=0; $i<count($data); $i++) $ans[] = array_sum($data[$i])/count($data[$i]); 
	return $ans;
    }
}