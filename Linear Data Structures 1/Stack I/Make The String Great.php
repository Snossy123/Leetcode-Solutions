class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeGood($s) {
        $st=[];
        for($i=0; $i<strlen($s);$i++){ 
            if(abs(ord($st[count($st)-1]) - ord($s[$i])) == 32){
                array_pop($st);
            }else{ 
                $st[] = $s[$i];
            }
        }
        $ans="";
        for($i=0; $i<count($st); $i++){
            $ans.=$st[$i];
        }
        return $ans;
    }
}