class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        $st = [];
        for($i=0; $i<strlen($s); $i++){
            if($s[$i]=='#'){
                array_pop($st);
            }else{
                $st[]=$s[$i];
            }
        } 
        $st2 = [];
        for($i=0; $i<strlen($t); $i++){
            if($t[$i]=='#'){
                array_pop($st2);
            }else{
                $st2[]=$t[$i];
            }
        }
        var_dump($st);
        var_dump($st2);
        if(count($st)!=count($st2)){return false;}
        for($i=0; $i<min(count($st),count($st2)); $i++){
            if($st[$i]!=$st2[$i]){
                return false;
            }
        }
        return true;
    }
}