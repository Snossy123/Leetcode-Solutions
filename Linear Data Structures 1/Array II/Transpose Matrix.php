class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function transpose($matrix) {
        $ans = [];
        for($i=0;$i<count($matrix[0]); $i++){ 
            $c = [];
            for($j=0;$j<count($matrix); $j++){
                $c[]= $matrix[$j][$i];
            }
            $ans[] = $c;
        }
        return $ans;
    }
}