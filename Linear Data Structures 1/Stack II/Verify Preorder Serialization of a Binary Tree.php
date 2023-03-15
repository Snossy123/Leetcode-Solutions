class Solution {

    /**
     * @param String $preorder
     * @return Boolean
     */
    function isValidSerialization($preorder) {
        $list = explode(',', $preorder);
        $st = [];
        for ($i = 0; $i < count($list); $i++) {
            if ($list[$i] === '#' && count($st) > 1 && end($st) === '#' && is_numeric($st[count($st)-2])) {
                    array_pop($st);
                    array_pop($st);
                    while(count($st) > 1 && end($st) === '#'){
                        array_pop($st);
                        array_pop($st);
                    }
                    $st[] = '#';
            } 
            else { 
                $st[] = $list[$i];
            } 
        }

        return count($st)==1 && end($st) === '#'??false;
    }
}