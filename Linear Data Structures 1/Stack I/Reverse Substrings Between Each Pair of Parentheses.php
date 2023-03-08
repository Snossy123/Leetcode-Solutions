class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseParentheses($s) {
        $st = [];
        for($i=0; $i<strlen($s); $i++){
            if($s[$i] === ')'){
                $sub = []; 
                while(end($st)!=='('){ 
                    $sub[] = end($st);
                    array_pop($st);
                }
                array_reverse($sub);
                array_pop($st);
                foreach($sub as $k){
                    $st[] = $k;
                } 
            }else{
                $st[] = $s[$i];
            }
        }
        $ans = "";
        foreach($st as $n){
            $ans .= $n;
        }
        return $ans;
    }
}