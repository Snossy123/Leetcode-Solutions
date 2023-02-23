class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function dominantIndex($nums) {
        $max = max($nums);
        $ind = -1;
        for($i=0; $i<count($nums); $i++){
            echo $nums[$i];
            if($max == $nums[$i]){
                $ind = $i;
            }
            else if($max < 2*$nums[$i]){
                return -1;
            }
            
        }
        return $ind;
    }
}