class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) {
        $dic = [];
        for($i=1; $i<=count($nums); $i++){
            $dic[$i] = 0;
        }
        $ans = [];
        for($i=0; $i<count($nums); $i++){
            $dic[$nums[$i]] = 1;
        }
        for($i=1; $i<=count($nums); $i++){
            if(!$dic[$i])
                $ans[] = $i;
        }
        return $ans;
    }
}