 
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root) {
        $que = [$root];
        $ans = [];
        while(!empty($que)){
            $sz = count($que);
            $currVal = $que[$sz-1]->val;
            for($q=0; $q<$sz; $q++){
                $curr = array_shift($que);
                
                if($curr->left != null){$que[] = $curr->left;} 
                if($curr->right != null){$que[] = $curr->right;}
            }
            $ans[] = $currVal;
        }
        return $ans;
    }
}