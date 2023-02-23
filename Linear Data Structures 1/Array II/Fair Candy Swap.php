class Solution {

    /**
     * @param Integer[] $aliceSizes
     * @param Integer[] $bobSizes
     * @return Integer[]
     */
    function fairCandySwap($aliceSizes, $bobSizes) {
        $sumalice =array_sum($aliceSizes);
        $sumbob =array_sum($bobSizes);
        $need = ($sumalice + $sumbob) /2;
        $dic = [];
        for($j=0; $j<count($bobSizes); $j++){
            if(isset($dic[$bobSizes[$j]])){
                $dic[$bobSizes[$j]]++;
            }else{
                $dic[$bobSizes[$j]] = 1;
            }
        }
        

        for($i=0; $i<count($aliceSizes); $i++){ 
            $x = $need - ($sumalice - $aliceSizes[$i]); 
            if(isset($dic[$x])){
                return [$aliceSizes[$i], $x];
            }   
        }
        return [];
    }
}