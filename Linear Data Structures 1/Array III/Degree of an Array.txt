class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findShortestSubArray($nums) {
        $fre = [];
        for($i=0; $i<count($nums); $i++){
            if(isset($fre[$nums[$i]])){
                $fre[$nums[$i]]++;
            }else{
                $fre[$nums[$i]] = 1;
            }
        }
        $maxfre = max(array_values($fre));
        $ans = 50000; 
        foreach(array_keys($fre) as $freq){
           
            if($fre[$freq] == $maxfre){  

                $f = -1;
                $l = -1;
                for($i=0, $j=count($nums)-1; $i<count($nums); $i++, $j--){
                    
                    
                    if($nums[$i] == $freq && $f==-1){
                         
                        $f = $i;
                    } 
                    if($nums[$j] == $freq && $l==-1){
                        $l = $j;
                    }
                } 
                $ans = ($l - $f) < $ans ? ($l - $f):$ans;
            }

        }
        
        return $ans+1;
    }
}