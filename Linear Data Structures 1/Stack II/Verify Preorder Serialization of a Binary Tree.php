class Solution {

    /**
     * @param String $preorder
     * @return Boolean
     */
    function isValidSerialization($preorder) {
        $list = explode(',', $preorder);

        for ($i = $c = 0; $c >= 0 && $i < count($list); $i++) {
            if ($list[$i] === '#') {
                $c--; } else { $c++;
            }
        }

        return $c === -1 && $i === count($list);
    }
}