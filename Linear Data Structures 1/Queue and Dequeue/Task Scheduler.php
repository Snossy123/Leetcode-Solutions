class Solution {

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    function leastInterval($tasks, $n) {
        $tasksCount = array_count_values($tasks);
        $maxTaskCount = max($tasksCount);
        $maxTaskCountNum = 0; 
        foreach ($tasksCount as $taskCount) { 
            if ($taskCount === $maxTaskCount) 
            { 
                $maxTaskCountNum++;
            }
        }
        $result = ($maxTaskCount - 1) * ($n + 1) + $maxTaskCountNum;
        return max($result, count($tasks));
    }
}