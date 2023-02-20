class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function helper($i, $arr, $subarr){
        echo $i;
        // base
        if($i == count($arr)){
            if (count($subarr) % 2 != 0){ 
                return array_sum($subarr);
            }
            return 0;
        }

        // divide
        // take or not take this element
        // conquer
        $j = $i+1; 
        $nottake = count($subarr) % 2 != 0 ? array_sum($subarr) : 0;
        $subarr[] = $arr[$i];
        $take = $this->helper($j, $arr, $subarr);
        // combine 
        return $nottake + $take;
    }
    function sumOddLengthSubarrays($arr) {
        $ans = 0;
        for($i=0; $i<count($arr); $i++){
            $ans += $this->helper($i, $arr, []);
        }
        return $ans;
    }
}