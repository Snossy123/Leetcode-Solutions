class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function diagonalSum($mat) {
        $res = 0;
        for($r=0; $r<count($mat); $r++){
            $res += ($mat[$r][$r] + $mat[$r][count($mat)-1 - $r]);
        }
        
        return count($mat) % 2 == 0 ? $res : $res-$mat[(int)count($mat)/2][(int)count($mat)/2];
    }
}