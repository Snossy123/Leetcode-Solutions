class Solution {

    /**
     * @param Integer[] $salary
     * @return Float
     */
    function average($salary) {
        $sum = array_sum($salary);
        $min =  min($salary);
        $max =  max($salary);
        $n = count($salary);
        return ($sum - $min - $max) / ($n - 2);
    }
}