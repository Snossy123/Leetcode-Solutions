## Kth Missing Positive Number
Problem Link: https://leetcode.com/problems/kth-missing-positive-number/

```php
class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findKthPositive($arr, $k) {
        $ans = [];
        $x = 1;
        $i=0;
        while(true){  
            if($x == $arr[$i]){ 
                $i++;
                $x++;
            }
            else{ 
                $ans[] = $x;
                $x++;
                $k--;
            }
            if($k==0){
                return end($ans);
            }
        }
    }
}
```

## First Unique Character in a String
Problem Link: https://leetcode.com/problems/first-unique-character-in-a-string/

```php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        $frq = array_count_values(str_split($s));
        $i=0; $val = -1;
        foreach($frq as $k=>$v){
            if($v==1) {
                $val = $k; break;
            }
            $i++;
        }

        return $val==-1?-1:strpos($s, $val);
    }
}
```

## Intersection of Two Arrays II
Problem Link: https://leetcode.com/problems/intersection-of-two-arrays-ii/

```php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        $frq1 = array_count_values($nums1);
        $frq2 = array_count_values($nums2);
        $intky = array_intersect(array_keys($frq1), array_keys($frq2));
        $ans=[];
        foreach($intky as $k){
            $n = min($frq1[$k], $frq2[$k]); 
            for($i=0; $i<$n; $i++){
                $ans[] = $k;
            }
        }
        return $ans;
    }
}
```

## 	Longest Palindrome
Problem Link: https://leetcode.com/problems/longest-palindrome/

```php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $frq = array_count_values(str_split($s));
        $even = 0;
        $odd = false;
        foreach($frq as $k=>$v){
            if($v%2==0){
                $even+=$v;
            }else{
                $odd=true;
                $even+=$v-1;
            }
        }
        if($odd){
            $even++;
        } 
        return $even;
    }
}
```

## 	Verifying an Alien Dictionary
Problem Link: https://leetcode.com/problems/verifying-an-alien-dictionary/

```php
class Solution {
    function checkInc($frq, $w1, $w2){
        for($i=0; $i<min(strlen($w1), strlen($w2)); $i++){
            if($frq[$w1[$i]] < $frq[$w2[$i]]) return true;
            if($frq[$w1[$i]] > $frq[$w2[$i]]) return false;
        }
        if(strlen($w1) > strlen($w2) && strpos($w1, $w2) !== false) return false;
        return true;
    }
    /**
     * @param String[] $words
     * @param String $order
     * @return Boolean
     */
    function isAlienSorted($words, $order) {
        $frq = [];
        for($i=0; $i<strlen($order); $i++)
            $frq[$order[$i]] = $i;
        for($i=0; $i<count($words)-1; $i++)
          if(!$this->checkInc($frq, $words[$i], $words[$i+1]))
              return false; 
        return true;
    }
}
```

##  Minimum Index Sum of Two Lists
Problem Link: https://leetcode.com/problems/minimum-index-sum-of-two-lists/

```php
class Solution {

    /**
     * @param String[] $list1
     * @param String[] $list2
     * @return String[]
     */
    function findRestaurant($list1, $list2) {
        $common = array_values(array_intersect($list1, $list2)); 
        $sum=[];
        for($i=0; $i<count($common); $i++) 
            $sum[$common[$i]] = 0; 

        for($i=0; $i<count($list1); $i++) 
            if(isset($sum[$list1[$i]])) 
                $sum[$list1[$i]] += $i; 

        for($i=0; $i<count($list2); $i++) 
            if(isset($sum[$list2[$i]])) 
                $sum[$list2[$i]] += $i;  

        $min = min(array_values($sum));
        $ans = [];
        foreach($sum as $k=>$v) 
            if($v == $min) 
                $ans[]=$k; 
        return $ans;
    }
}
```

## Longest Harmonious Subsequence
Problem Link: https://leetcode.com/problems/longest-harmonious-subsequence/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLHS($nums) {
        $frq = array_count_values($nums); 
        $ans = 0;
        for($i=0; $i<count($frq); $i++){
            if(isset($frq[array_keys($frq)[$i]+1])){
                $ans = max($ans, $frq[array_keys($frq)[$i]+1]+$frq[array_keys($frq)[$i]]);
            }
        }
        return $ans;
    }
}
```

## Longest Word in Dictionary
Problem Link: https://leetcode.com/problems/longest-word-in-dictionary/

```php
class Solution {

    /**
     * @param String[] $words
     * @return String
     */
    function longestWord($words) {
        $frq = array_count_values($words);
        $ans = "";
        foreach($words as $w){
            $f=true;
            for($i=strlen($w)-2; $i>-1; $i--){
                $sub = substr($w, 0, $i+1); 
                if(!isset($frq[$sub])){
                    $f=false;
                    break;
                } 
            } 
            if($f && strlen($w) > strlen($ans)) $ans = $w; 
            if($f && strlen($w) == strlen($ans)) $ans = min($ans, $w); 
        }
        return $ans;
    }
}
```

## 	Two Sum
Problem Link: https://leetcode.com/problems/two-sum/

```php
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $frq = array_count_values($nums);
        foreach($frq as $k=>$v){ 
            if(
                isset($frq[$target - $k]) && 
                $target - $k != $k
            ){
                return ([array_search($k, $nums), 
                        array_search($target - $k, 
                        $nums)]);
            }
            if(
                isset($frq[$target - $k]) && 
                $target - $k == $k && 
                $frq[$k]>1
            ){
                return ([
                    array_search($k, $nums), 
                    count($nums) - 1 - 
                    array_search($target - $k, 
                    array_reverse($nums))
                    ]);
            }
        }
        return [];
    }
}
```

## Isomorphic Strings
Problem Link: https://leetcode.com/problems/isomorphic-strings/

```php
class Solution {
    
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        if(strlen($s)!=strlen($t)) return false;
        return $this->check($s, $t)&&$this->check($t, $s);
    }
    function check($s, $t){
        $f=[];
        for($i=0; $i<strlen($s); $i++){ 
            if(isset($f[$s[$i]])){
                if($f[$s[$i]] !== $t[$i]) 
                    return false; 
            }else{
                $f[$s[$i]] = $t[$i];  
            }
        }
        return true;
    }
}
```
