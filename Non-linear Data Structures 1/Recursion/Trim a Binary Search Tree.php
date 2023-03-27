class Solution {
    function BST(&$root, $low, $high, &$prev){
        if(!$root)return -1;
        $l = $this->BST($root->left, $low, $high, $root);
        $r = $this->BST($root->right, $low, $high, $root); 
        if(!($root->val>=$low && $root->val<=$high)){
            // case 1 > no child
            if(!$root->left && !$root->right){
                $root = null; return $root->val;
            }
            // case 2 > one child 
            else if (($root->left && !$root->right) || (!$root->left && $root->right)){
                
                // prev -> next of curr root 
                // root has left
                if($root->left && !$root->right){ 
                    
                    // check prev->left || prev->right will be change
                    if($prev->left == $root)
                    { 
                        $prev->left = $root->left;
                        $root = $prev->left;
                    }else{
                        $prev->right = $root->left;
                        $root = $prev->right;
                    }
                }// root has right
                else{ 
                    // check prev->left || prev->right will be change
                    if($prev->left == $root)
                    {
                        $prev->left = $root->right;
                        $root = $prev->left;
                    }else{
                        $prev->right = $root->right;
                        $root = $prev->right;
                    }
                }
            }
            // case 3 > two child 
            else{ 
                
                // 1- get max node in left branch 2- change curr val with max 3- remove max from left branch
                // change return val to return always max
                $root->val = $l;
                $maxleft = $this->BST($root->left, $root->val, $root->val, $root);
            } 
        } 
        return max([$l, $root->val, $r]);
    }
    /**
     * @param TreeNode $root
     * @param Integer $low
     * @param Integer $high
     * @return TreeNode
     */
    function trimBST($root, $low, $high) {
        $x = $this->BST($root, $low, $high, $root);
        return $root;
    }
}