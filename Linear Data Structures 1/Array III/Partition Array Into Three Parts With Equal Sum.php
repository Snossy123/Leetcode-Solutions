class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canThreePartsEqualSum($arr) {
        $sum = array_sum($arr);
        $need = $sum / 3;
        if($sum % 3 != 0){
            return false;
        } 
        $ans = 0;
        $temp = 0;
        for($i=0; $i<count($arr); $i++){
            $temp += $arr[$i];
            if($temp == $need){
                $ans++;
                $temp=0;
            }
        }
        return $ans>=3??false;
    }
}