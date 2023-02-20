class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = $prices[0]; 
        $prof = 0;
        for($i=1; $i<count($prices); $i++){
            if($prices[$i] < $min){ 
                $min = $prices[$i]; 
            }else if($prices[$i] - $min > $prof){
                $prof = $prices[$i] - $min;
            }
        }
         
        return $prof;
    }
}