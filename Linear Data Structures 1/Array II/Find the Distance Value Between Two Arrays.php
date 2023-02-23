class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @param Integer $d
     * @return Integer
     */
    function findTheDistanceValue($arr1, $arr2, $d) {
        $ans = 0;
        for($i=0; $i<count($arr1); $i++){
            for($j=0; $j<count($arr2); $j++){
                $diff = abs($arr1[$i] - $arr2[$j]);
                if($diff <= $d){
                    $ans++;
                    break;
                }
            }    
        }
        return count($arr1) - $ans;
    }
}