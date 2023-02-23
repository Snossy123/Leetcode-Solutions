class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */ 
    function heightChecker($heights) {
        $org = $heights;
        sort($heights);
        $diff = 0;
        for($i=0; $i<count($heights); $i++){
            if($org[$i] != $heights[$i]){
                $diff++;
            }
        }
        return $diff;
        
    }
}