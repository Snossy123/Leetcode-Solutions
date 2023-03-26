class Solution {
    function XORsub($arr){
        if(count($arr)==0)return 0;
        if(count($arr)==1)return $arr[0];
        $res = $arr[0];
        for($i=1; $i<count($arr); $i++){
            $res ^= $arr[$i];
        }
        return $res;
    }

    function XORSum($subarr, $arr){
        if(empty($arr)) return $this->XORsub($subarr); 
        return $this->XORSum($subarr, array_slice($arr, 1)) + $this->XORSum(array_merge($subarr, [$arr[0]]), array_slice($arr, 1));
    }
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function subsetXORSum($nums) {
        return $this->XORSum([], $nums);
    }
}