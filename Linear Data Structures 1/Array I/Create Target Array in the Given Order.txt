class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $index
     * @return Integer[]
     */
    function createTargetArray($nums, $index) {
        $res = [];
        for($i=0; $i<count($nums); $i++){
            array_splice($res, $index[$i], 0, $nums[$i]);
        }
        return $res;
    }
}