class Solution {

    /**
     * @param Integer[][] $boxes
     * @param Integer $portsCount
     * @param Integer $maxBoxes
     * @param Integer $maxWeight
     * @return Integer
     */
    function boxDelivering($boxes, $portsCount, $maxBoxes, $maxWeight) {
        $A=$boxes; $m1=$maxBoxes; $m2=$maxWeight;
        $n = count($A);
        
        $C = array_fill(0, $n, false); // consecutive ports are different or not
        for ($i = 0; $i < $n-1; $i++) {
            if ($A[$i][0] != $A[$i+1][0]) $C[$i] = true;
        }
            
        $dp = array_fill(0, $n+1, 0);
        $sum = 0; // total current weight on the ship
        $start = 0; // load all boxes from start to i in one voyage
        $diff = 0; // # different consecutive ports between start and i
            
        for ($i = 0; $i < $n; $i++) {
            if ($i-$start == $m1) { // drop 1 box because of # boxes constraint
                $sum -= $A[$start][1];
                if ($C[$start]) $diff--;
                $start++;
            }
                
            // Add box i, update current weight and diff
            $sum += $A[$i][1];
            if ($i > 0 && $C[$i-1]) $diff++;
                
            while ($sum > $m2) { // drop more boxex because of weight constraint
                $sum -= $A[$start][1];
                if ($C[$start]) $diff--;
                $start++;
            }

            while ($start < $i && $dp[$start] == $dp[$start+1]) {
                // drop more boxes if there is no point to carry them
                $sum -= $A[$start][1];
                if ($C[$start]) $diff--;
                $start++;
            }
                
            $dp[$i+1] = $diff + 2 + $dp[$start];
        }
        return $dp[$n];
    }
}