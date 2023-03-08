class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minAddToMakeValid($s) {
        $st = [];
        $ans=0;
        for($i=0; $i<strlen($s);$i++){
            if($s[$i] == '('){
                $st[]=$s[$i];
            }else{
                if(!count($st)){
                    $ans++;
                    continue;
                }else{
                    array_pop($st);
                }
            }
        }
        return $ans+count($st);
    }
}