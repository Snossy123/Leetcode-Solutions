## 1 bit and 2 bit characters
Problem Link: https://leetcode.com/problems/1-bit-and-2-bit-characters/

```php
class Solution {

    /**
     * @param Integer[] $bits
     * @return Boolean
     */
    function isOneBitCharacter($bits) { 
        $i=0;
        while($i<count($bits)){
            echo $i;
            if($i==count($bits)-1){return true;}
            if($bits[$i]){
               $i+=2; 
            }else{
                $i++;
            }
        }
        return false;
    }
}
```

## best time to buy and sell stock
Problem Link: https://leetcode.com/problems/best-time-to-buy-and-sell-stock/

```php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = $prices[0]; 
        $prof = 0;
        for($i=1; $i<count($prices); $i++){
            if($prices[$i] < $min){ 
                $min = $prices[$i]; 
            }else if($prices[$i] - $min > $prof){
                $prof = $prices[$i] - $min;
            }
        }
         
        return $prof;
    }
}
```

## can place flowers
Problem Link: https://leetcode.com/problems/can-place-flowers/

```php
class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        $ans = 0;
        $j=0;
        for($i=0; $i<$n; $i++){
            for(; $j<count($flowerbed);$j++){
                if(!$flowerbed[$j])
                {if($j==0){
                    if(!$flowerbed[$j+1]){
                        $flowerbed[$j] = 1;
                        $ans++;
                        break;
                    }
                }else{
                    if(!$flowerbed[$j+1] && !$flowerbed[$j-1]){
                        $flowerbed[$j] = 1;
                        $ans++;
                        break;
                    }
                }
                }
            }
        }
        return $ans == $n?? false;
    }
}
```

## 	degree of an array
Problem Link: https://leetcode.com/problems/degree-of-an-array/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findShortestSubArray($nums) {
        $fre = [];
        for($i=0; $i<count($nums); $i++){
            if(isset($fre[$nums[$i]])){
                $fre[$nums[$i]]++;
            }else{
                $fre[$nums[$i]] = 1;
            }
        }
        $maxfre = max(array_values($fre));
        $ans = 50000; 
        foreach(array_keys($fre) as $freq){
           
            if($fre[$freq] == $maxfre){  

                $f = -1;
                $l = -1;
                for($i=0, $j=count($nums)-1; $i<count($nums); $i++, $j--){
                    
                    
                    if($nums[$i] == $freq && $f==-1){
                         
                        $f = $i;
                    } 
                    if($nums[$j] == $freq && $l==-1){
                        $l = $j;
                    }
                } 
                $ans = ($l - $f) < $ans ? ($l - $f):$ans;
            }

        }
        
        return $ans+1;
    }
}
```

## 	detect pattern of length m repeated k or more times
Problem Link: https://leetcode.com/problems/detect-pattern-of-length-m-repeated-k-or-more-times/

```php
class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $m
     * @param Integer $k
     * @return Boolean
     */
    function containsPattern($arr, $m, $k) {
        $c = 0;
        for($i=0; $i+$m<count($arr); $i++){
            if($arr[$i]==$arr[$i+$m]){
                $c++;
            }else{
                $c = 0;
            }
            if($c == ($k-1)*$m){
                return true;
            }
        }
        return false;
    }
}
```

## find all numbers disappeared in an array
Problem Link: https://leetcode.com/problems/find-all-numbers-disappeared-in-an-array/

```php
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
```

## largest number at least twice of others
Problem Link: https://leetcode.com/problems/largest-number-at-least-twice-of-others/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function dominantIndex($nums) {
        $max = max($nums);
        $ind = -1;
        for($i=0; $i<count($nums); $i++){
            echo $nums[$i];
            if($max == $nums[$i]){
                $ind = $i;
            }
            else if($max < 2*$nums[$i]){
                return -1;
            }
            
        }
        return $ind;
    }
}
```

## partition array into three parts with equal sum
Problem Link: https://leetcode.com/problems/partition-array-into-three-parts-with-equal-sum/

```php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canThreePartsEqualSum($arr) {
        $sum = array_sum($arr);
        $need = $sum / 3;
        if($sum % 3 != 0){
            return false;
        } 
        $ans = 0;
        $temp = 0;
        for($i=0; $i<count($arr); $i++){
            $temp += $arr[$i];
            if($temp == $need){
                $ans++;
                $temp=0;
            }
        }
        return $ans>=3??false;
    }
}
```

## 	pascals triangle ii
Problem Link: https://leetcode.com/problems/pascals-triangle-ii/

```php
class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $row = [];
        if($rowIndex < 0){
            return [];
        }
        $row[] = 1;
        for($i=1; $i<=$rowIndex; $i++){
            for($j=count($row)-1; $j>0; $j--){
                $row[$j] = $row[$j] + $row[$j-1];
            }
            $row[] = 1;
        }
        return $row;
    }
}
```

##  third maximum number
Problem Link: https://leetcode.com/problems/third-maximum-number/

```php
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
```
