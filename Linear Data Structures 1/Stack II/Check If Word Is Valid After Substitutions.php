class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $st=[];
        for($i=0; $i<strlen($s);$i++){
            if($s[$i] != 'c'){
                array_push($st, $s[$i]);
            }else{
                $x = $s[$i];
                if(count($st)<2){return false;}
                $x = end($st) . $x;
                array_pop($st);
                $x = end($st) . $x;
                array_pop($st);

                if($x !== 'abc'){
                    array_push($st, $x[0]);
                    array_push($st, $x[1]);
                    array_push($st, $x[2]);
                }
            }
        }
        var_dump($st);
        return empty($st)?true:false;
    }
}