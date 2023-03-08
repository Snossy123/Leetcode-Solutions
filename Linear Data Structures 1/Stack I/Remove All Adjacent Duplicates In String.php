class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeDuplicates($s) {
        $st=[];
        for($i=0;$i< strlen($s);$i++){ 
            if($s[$i] == $st[count($st)-1]){
                array_pop($st);
            }else{
                $st[] = $s[$i];
            }
        } 
        $ans="";
        foreach($st as $i){ 
            $ans.=$i;
        }
        return $ans;
    }
}