class Solution {

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s) {
        $st = [];
        if(is_numeric($s)){return "";}
        for($i=0; $i<strlen($s); $i++){
            if($s[$i] != ']'){
                array_push($st, $s[$i]);
            }else{
                $x = "";
                while(end($st) != '['){
                    $x.=end($st);
                    array_pop($st);
                }
                array_pop($st);  
                $x = strrev($x);
                $repN = "";
                while(!empty($st) && is_numeric(end($st))){
                    $repN.=end($st);
                    array_pop($st);
                } 
                $rep = (int)strrev($repN); 
                for($j=0; $j<$rep; $j++){
                    for($k=0; $k<strlen($x); $k++){
                        array_push($st, $x[$k]);
                    }
                }
            }
        }
        $ans = "";
        foreach($st as $b){
            $ans.=$b;
        } 
        return $ans;
    }
}