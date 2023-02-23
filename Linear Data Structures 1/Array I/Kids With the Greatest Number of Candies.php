class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $maxCan = max($candies);
        $res = [];
        foreach($candies as $c){
            if($c + $extraCandies >= $maxCan){
                $res[] = true;
            }else{
                $res[] = false;
            }
        }
        return $res;
    }
}