class Solution {

    /**
     * @param Integer[] $bits
     * @return Boolean
     */
    function isOneBitCharacter($bits) { 
        $i=0;
        while($i<count($bits)){
            echo $i;
            if($i==count($bits)-1){return true;}
            if($bits[$i]){
               $i+=2; 
            }else{
                $i++;
            }
        }
        return false;
    }
}