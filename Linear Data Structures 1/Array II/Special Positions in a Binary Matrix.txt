class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSpecial($mat) {
        $rowsum = [];
        $colsum = [];
        for($i=0;$i<count($mat); $i++){
            $rowsum[] = array_sum($mat[$i]); 
        }
        for($i=0;$i<count($mat[0]); $i++){ 
            $cs = 0;
            for($j=0;$j<count($mat); $j++){
                $cs += $mat[$j][$i];
            }
            $colsum[] = $cs;
        }
        var_dump($rowsum);
        var_dump($colsum);
        $ans = 0;
        for($i=0;$i<count($mat); $i++){
            for($j=0;$j<count($mat[0]); $j++){
                if($mat[$i][$j] && $rowsum[$i] == $colsum[$j] && $colsum[$j]==1){
                    $ans++;
                }
            }
        }
        return $ans;
    }
}