class Solution {

    /**
     * @param Integer[] $position
     * @return Integer
     */
    function minCostToMoveChips($position) {
        $mincost = 1000000000;
        for($i=0; $i<count($position); $i++){ 
            $cost = 0;
            if($i!=$j){
                for ($j=0; $j<count($position); $j++){
                    if($position[$j] != $position[$i]){
                        $diff = abs($position[$j] - $position[$i]);
                        if($diff%2!=0){
                            $cost += 1;
                        }
                    }
                }
                if($cost < $mincost){
                    $mincost = $cost;
                }
            }
        }
        return $mincost == 1000000000 ? 0 : $mincost;
    }
}