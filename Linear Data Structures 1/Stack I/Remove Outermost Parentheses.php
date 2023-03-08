class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeOuterParentheses($s) {
        $st = [];
        for($c=0; $c<strlen($s); $c++){
            if($s[$c] == '('){
                if(count($st) == 0){
                    $s[$c] = '*';
                }
                $st[] = $s[$c];
            }
            if($s[$c] == ')'){
                if(count($st) == 1){
                    $s[$c] = '*';
                }
                array_pop($st);
            }
        }
        return str_replace('*', '', $s); 
    }
}