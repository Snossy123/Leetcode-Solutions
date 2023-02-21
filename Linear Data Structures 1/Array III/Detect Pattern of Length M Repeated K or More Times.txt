class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $m
     * @param Integer $k
     * @return Boolean
     */
    function containsPattern($arr, $m, $k) {
        $c = 0;
        for($i=0; $i+$m<count($arr); $i++){
            if($arr[$i]==$arr[$i+$m]){
                $c++;
            }else{
                $c = 0;
            }
            if($c == ($k-1)*$m){
                return true;
            }
        }
        return false;
    }
}