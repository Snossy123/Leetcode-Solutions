class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @param Integer $start
     * @return Integer
     */
    function getMinDistance($nums, $target, $start) {
        $min = 1004;
        for($i=0; $i<count($nums); $i++){
            if($nums[$i] == $target && abs($i - $start) < $min){
                $min = abs($i - $start);
            }
        }
        return $min;
    }
}