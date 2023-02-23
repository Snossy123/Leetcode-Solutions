class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minOperations($s) {
        $ss = $s;
        $ans = 0;
        for($i=1; $i<strlen($s); $i++){
            if($s[$i-1] == $s[$i]){
                $ans++;
                $s[$i] = $s[$i]? '0':'1'; 
            }
        }
        $ans2 = 1;
        $ss[0] = $s[0]? '0':'1';
        for($i=1; $i<strlen($ss); $i++){
            if($ss[$i-1] == $ss[$i]){
                $ans2++;
                $ss[$i] = $ss[$i]? '0':'1'; 
            }
        }
        return min($ans, $ans2);
    }
}