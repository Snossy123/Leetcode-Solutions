class Solution {
    function FBT($n){
        if($n==1) return [new TreeNode(0)];
        $ans = [];
        for($i=1; $i<$n-1; $i++){
            $left = $this->FBT($i);
            $right = $this->FBT($n-$i-1);
            for($l=0; $l<count($left); $l++){
                for($r=0; $r<count($right); $r++){
                  $root = new TreeNode(0, $left[$l], $right[$r]);
                  $ans[] = $root;  
                }    
            }
        }
        return $ans;
    }
    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    function allPossibleFBT($n) {
        return $this->FBT($n);
    }
}