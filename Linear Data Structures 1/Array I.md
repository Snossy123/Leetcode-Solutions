## average salary excluding the minimum and maximum salary
Problem Link: https://leetcode.com/problems/average-salary-excluding-the-minimum-and-maximum-salary/

```php
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
```

## create target array in the given order
Problem Link: https://leetcode.com/problems/create-target-array-in-the-given-order/

```php
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
```

## final prices with a special discount in a shop
Problem Link: https://leetcode.com/problems/final-prices-with-a-special-discount-in-a-shop/

```php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer[]
     */
    function finalPrices($prices) {
         for($i=0; $i<count($prices); $i++){
             for($j=$i+1; $j<count($prices); $j++){
                if($prices[$j] <= $prices[$i]){
                    $prices[$i] -= $prices[$j];
                    break;
                }
             }
         }
         return $prices;
    }
}
```

## 	find n unique integers sum up to zero
Problem Link: https://leetcode.com/problems/find-n-unique-integers-sum-up-to-zero/

```php
class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function sumZero($n) {
        $res = [];
        for ($i=1; $i<=$n/2; $i++){
            $res[] = $i;
            $res[] = -1 * $i;
        }
        if($n%2!=0){
                $res[] = 0;
        }
        return $res;
    }
}
```

## 	flipping an image
Problem Link: https://leetcode.com/problems/flipping-an-image/

```php
class Solution {

    /**
     * @param Integer[][] $image
     * @return Integer[][]
     */
    function flipAndInvertImage($image) {
        $newImage = [];
        foreach($image as $row){
            $newrow = [];
            for($i = count($row)-1; $i>-1; $i--){
                $newrow[] = $row[$i] ? 0:1;
            }
            $newImage[] = $newrow;
        }
        return $newImage;
    }
}
```

## height checker
Problem Link: https://leetcode.com/problems/height-checker/

```php
class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */ 
    function heightChecker($heights) {
        $org = $heights;
        sort($heights);
        $diff = 0;
        for($i=0; $i<count($heights); $i++){
            if($org[$i] != $heights[$i]){
                $diff++;
            }
        }
        return $diff;
        
    }
}
```

## kids with the greatest number of candies
Problem Link: https://leetcode.com/problems/kids-with-the-greatest-number-of-candies/

```php
class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $maxCan = max($candies);
        $res = [];
        foreach($candies as $c){
            if($c + $extraCandies >= $maxCan){
                $res[] = true;
            }else{
                $res[] = false;
            }
        }
        return $res;
    }
}
```

## matrix diagonal sum
Problem Link: https://leetcode.com/problems/matrix-diagonal-sum/

```php
class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function diagonalSum($mat) {
        $res = 0;
        for($r=0; $r<count($mat); $r++){
            $res += ($mat[$r][$r] + $mat[$r][count($mat)-1 - $r]);
        }
        
        return count($mat) % 2 == 0 ? $res : $res-$mat[(int)count($mat)/2][(int)count($mat)/2];
    }
}
```

## 	minimum cost to move chips to the same position
Problem Link: https://leetcode.com/problems/minimum-cost-to-move-chips-to-the-same-position/

```php
class Solution {

    /**
     * @param Integer[] $position
     * @return Integer
     */
    function minCostToMoveChips($position) {
        $mincost = 1000000000;
        for($i=0; $i<count($position); $i++){ 
            $cost = 0;
            if($i!=$j){
                for ($j=0; $j<count($position); $j++){
                    if($position[$j] != $position[$i]){
                        $diff = abs($position[$j] - $position[$i]);
                        if($diff%2!=0){
                            $cost += 1;
                        }
                    }
                }
                if($cost < $mincost){
                    $mincost = $cost;
                }
            }
        }
        return $mincost == 1000000000 ? 0 : $mincost;
    }
}
```

## sum of all odd length subarrays
Problem Link: https://leetcode.com/problems/sum-of-all-odd-length-subarrays/

```php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function helper($i, $arr, $subarr){
        echo $i;
        // base
        if($i == count($arr)){
            if (count($subarr) % 2 != 0){ 
                return array_sum($subarr);
            }
            return 0;
        }

        // divide
        // take or not take this element
        // conquer
        $j = $i+1; 
        $nottake = count($subarr) % 2 != 0 ? array_sum($subarr) : 0;
        $subarr[] = $arr[$i];
        $take = $this->helper($j, $arr, $subarr);
        // combine 
        return $nottake + $take;
    }
    function sumOddLengthSubarrays($arr) {
        $ans = 0;
        for($i=0; $i<count($arr); $i++){
            $ans += $this->helper($i, $arr, []);
        }
        return $ans;
    }
}
```

## Running Sum of 1d Array
Problem Link: https://leetcode.com/problems/running-sum-of-1d-array/description/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums) {
        $runningSum = [];
        array_push($runningSum, $nums[0]);
        for($i = 1; $i<count($nums); $i++){
            array_push($runningSum, $runningSum[$i-1]+$nums[$i]);
        }
        return $runningSum;
    }
}
```

## Richest Customer Wealth
Problem Link: https://leetcode.com/problems/richest-customer-wealth/description/

```php
class Solution {

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts) {
        return max(array_map(fn($account)=>array_sum($account), $accounts));
    }
}
```
```php
class Solution {

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts) {
        $biggest = 0;
        for($i=0; $i < count($accounts); $i++){
            $curr = 0;
            for($j=0; $j < count($accounts[$i]); $j++){
                $curr += $accounts[$i][$j];
            }
            $biggest = max($biggest, $curr);
        }
        return $biggest; 
    }
}
```


## Shuffle the Array
Problem Link: https://leetcode.com/problems/shuffle-the-array/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n) {
        $ans = [];
        for($i=0; $i<$n; $i++){
            $ans[] = $nums[$i];
            $ans[] = $nums[$i+$n];
        }
        return $ans;
    }
}
```

## Decompress Run-Length Encoded List
Problem Link: https://leetcode.com/problems/decompress-run-length-encoded-list/description/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function decompressRLElist($nums) {
        $ans = [];
        for($i=0; $i<count($nums)/2; $i++){
            [$freq, $val] = [$nums[2*$i], $nums[2*$i+1]];
            $arr = array_fill(0, $freq, $val);
            $ans = array_merge($ans, $arr);
        } 
        return $ans;
    }
}
```
## Count Items Matching a Rule
Problem Link: https://leetcode.com/problems/count-items-matching-a-rule/description/

```php
class Solution {

    /**
     * @param String[][] $items
     * @param String $ruleKey
     * @param String $ruleValue
     * @return Integer
     */
    function countMatches($items, $ruleKey, $ruleValue) {
        $ans=0;
        foreach($items as [$type, $color, $name]){
            $ans += $$ruleKey==$ruleValue??0; 
        }
        return $ans;
    }
}
```

## XOR Operation in an Array
Problem Link: https://leetcode.com/problems/xor-operation-in-an-array/description/

```php
class Solution {

    /**
     * @param Integer $n
     * @param Integer $start
     * @return Integer
     */
    function xorOperation($n, $start) {
        $x = $start;
        for($i=1; $i<$n; $i++){
            $y = $start + 2 * $i;
            $x ^= $y;
        }
        return $x;
    }
}
```
