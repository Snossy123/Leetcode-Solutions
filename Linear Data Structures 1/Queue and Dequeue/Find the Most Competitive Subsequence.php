class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function mostCompetitive($nums, $k) {
        $n=count($nums);
        $a=[$nums[0]];
        for ($i=1; $i<$n; $i++){ 
            while ($a && $a[count($a)-1]>$nums[$i] && $n-$i>$k-count($a))
                array_pop($a);
            if (count($a)<$k){
                $a[] = $nums[$i];
            }
        }
        return $a;

    }
}