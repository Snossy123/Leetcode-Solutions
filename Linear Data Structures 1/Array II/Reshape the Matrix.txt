class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer $r
     * @param Integer $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c) {
        if((count($mat) * count($mat[0]))!=($r * $c)){
            return $mat;
        }
        $x=0;
        $ans = [];
        $row = [];
        for($i=0;$i<count($mat); $i++){
            for($j=0;$j<count($mat[0]); $j++){
                $x++;
                $row[] = $mat[$i][$j];
                if($x % $c == 0){
                    $ans[] = $row;
                    $row = [];
                }
            }
        }
        return $ans;
    }
}