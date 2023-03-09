class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeDuplicateLetters($s) {
        $dic = []; 
        $vis = [];
        for($i=0; $i<strlen($s); $i++){
            $dic[$s[$i]] = $i;
            $vis[$s[$i]] = false;
        } 
        $st=[];
        for($i=0; $i<strlen($s); $i++){
            if(!$vis[$s[$i]]){ 
                if(end($st) > $s[$i]){
                    while($dic[end($st)] > $i && end($st) > $s[$i]){
                        $vis[end($st)] = false;
                        array_pop($st);
                    }
                }
                array_push($st, $s[$i]);
                $vis[$s[$i]] = true; 
            }
            var_dump($st);
        }
        $ans = "";
        foreach($st as $s){
            $ans.=$s;
        } 
        return $ans;
    }
}