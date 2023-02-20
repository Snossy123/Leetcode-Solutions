class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkZeroOnes($s) {
        $l0=0;
        $l1=0;
        $s0=0;
        $s1=0;
        for($i=0; $i<strlen($s); $i++){
            if($s[$i]){
                if(!$s0){
                    $s1++;
                }else{
                    if($l1<$s1){
                        $l1 = $s1;
                    }
                    $s1=1;
                    if($l0<$s0){
                        $l0 = $s0;
                    }
                    $s0=0;
                }
            }else{
                if(!$s1){
                    $s0++;
                }else{
                    if($l0<$s0){
                        $l0 = $s0;
                    }
                    $s0=1;
                    
                    if($l1<$s1){
                        $l1 = $s1;
                    }
                    $s1=0;
                }

            }
            echo $l0;
            echo $l1;
            echo $s0;
            echo $s1;
        }
        if($l1<$s1){
            $l1 = $s1;
        } 
        if($l0<$s0){
            $l0 = $s0;
        }
        return $l1 > $l0 ? true:false;
    }
}