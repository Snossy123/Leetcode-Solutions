class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSumMinProduct($nums) {
        $st = new SplStack();
        $dp = array_fill(0, count($nums)+1, 0);
        $res = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $dp[$i+1] = $dp[$i] + $nums[$i];
        }

        for ($i = 0; $i <= count($nums); $i++) {
            while (!$st->isEmpty() && ($i == count($nums) || $nums[$st->top()] > $nums[$i])) {
                $j = $st->pop();
                $res = max($res, ($dp[$i] - $dp[$st->isEmpty() ? 0 : $st->top() + 1]) * $nums[$j]);
            }
            $st->push($i);
        }

        return (int)($res % 1000000007);
    }
}