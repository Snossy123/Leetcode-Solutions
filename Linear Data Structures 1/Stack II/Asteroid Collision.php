class Solution {

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids) {
        $st=[]; 
        for($i=0; $i<count($asteroids); $i++){
            if($asteroids[$i] > 0 || empty($st) || end($st) < 0){
                array_push($st, $asteroids[$i]);
            }else{
                $left = $asteroids[$i] * -1;
                $right = end($st);
                if($left > $right){
                    array_pop($st);
                    $i--;
                }else if($left < $right){
                    continue;
                }else{
                    array_pop($st);
                }
            }
        } 
        return $st;
    }
}