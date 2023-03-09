class Solution {

    /**
     * @param Integer $n
     * @param String[] $logs
     * @return Integer[]
     */
    function exclusiveTime($n, $logs) {
    $map = array_fill(0, $n, 0);
        $stack = new SplStack(); foreach($logs as $log) { list($id, $op, $time) = explode(":", $log); if($op == "start")
            {
                if($stack->count()) $map[$stack->top()] += $time - $start_time; $stack->push($id); $start_time = $time; } else { $stack->pop();                
                $map[$id] += $time - $start_time + 1;
                $start_time = $time+1;
            }
        }
        return $map;
    }
}