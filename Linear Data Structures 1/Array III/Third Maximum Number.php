class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMax($nums) { 
        $nums = array_unique($nums);
        if(count($nums) < 3){return max($nums);}
        sort($nums); 
        return $nums[count($nums)-3];
    }
}