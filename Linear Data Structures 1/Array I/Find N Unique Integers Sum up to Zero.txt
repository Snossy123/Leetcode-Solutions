class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function sumZero($n) {
        $res = [];
        for ($i=1; $i<=$n/2; $i++){
            $res[] = $i;
            $res[] = -1 * $i;
        }
        if($n%2!=0){
                $res[] = 0;
        }
        return $res;
    }
}