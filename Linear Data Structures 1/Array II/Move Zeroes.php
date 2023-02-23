class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $n = count($nums);
        for($i=0; $i<$n; $i++){
            if(!$nums[$i]){
                unset($nums[$i]);
                $nums[] = 0;
            }
        }
        return $nums;
    }
}