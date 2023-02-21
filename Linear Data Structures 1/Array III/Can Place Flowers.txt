class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        $ans = 0;
        $j=0;
        for($i=0; $i<$n; $i++){
            for(; $j<count($flowerbed);$j++){
                if(!$flowerbed[$j])
                {if($j==0){
                    if(!$flowerbed[$j+1]){
                        $flowerbed[$j] = 1;
                        $ans++;
                        break;
                    }
                }else{
                    if(!$flowerbed[$j+1] && !$flowerbed[$j-1]){
                        $flowerbed[$j] = 1;
                        $ans++;
                        break;
                    }
                }
                }
            }
        }
        return $ans == $n?? false;
    }
}