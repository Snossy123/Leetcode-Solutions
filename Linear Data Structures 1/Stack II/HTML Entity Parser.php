class Solution {

    /**
     * @param String $text
     * @return String
     */
    function entityParser($text) {
        $dic = [
            '&quot;'=>'"',
            '&apos;'=>"'",
            '&amp;'=>'&',
            '&gt;'=>'>',
            '&lt;'=>'<',
            '&frasl;'=>'/'
        ];
        $st = [];
        for($i=0; $i<strlen($text);$i++){
            if($text[$i]!=';'){
                $st[] = $text[$i];
            }else{ 
                $ent = "";
                while(!empty($st) && end($st) != '&'){
                    $ent.=end($st);
                    array_pop($st);
                }
                $ent = strrev($ent);
                if(end($st) == '&'){
                    array_pop($st); 
                    $ent = '&' . $ent . ';'; 
                    if(isset($dic[$ent])){ 
                        $ent = $dic[$ent];
                        $ent .= '?';
                    }
                }else{
                    $ent = $ent . ';';
                }
                for($j=0; $j<strlen($ent);$j++){
                    $st[] = $ent[$j];
                }
            }
        }
        $ans = "";
        foreach($st as $s){
            if($s != '?')
                $ans.=$s;
        } 
        return $ans;

    }
}