## Number of Good Pairs
Problem Link: https://leetcode.com/problems/number-of-good-pairs/

```php
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        $freq = [];
        $total = 0;
        foreach($nums as $n){
            if(!isset($freq[$n])) $freq[$n] = 0;
            $total += $freq[$n];
            $freq[$n]++;
        }
        return $total;
    }
}
```

## Jewels and Stones
Problem Link: https://leetcode.com/problems/jewels-and-stones/

```php
class Solution {
    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    function numJewelsInStones($jewels, $stones) {
        $jewdict = []; for($j=0; $j<strlen($jewels); $j++) $jewdict[$jewels[$j]] = true;
        $ans = 0; for($s=0; $s<strlen($stones); $s++) if(isset($jewdict[$stones[$s]])) $ans++;
        return $ans;
    }
}
```

## How Many Numbers Are Smaller Than the Current Number
Problem Link: https://leetcode.com/problems/how-many-numbers-are-smaller-than-the-current-number/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums) {
        $hashTfreq = array_fill(0,102,0);
        $hashT = array_fill(0,102,0);
        for($i=0; $i<count($nums); $i++){
           $hashT[$nums[$i]]++;
           $hashTfreq[$nums[$i]]++;
        } 
        for($i=1; $i<count($hashT); $i++) $hashT[$i]+=$hashT[$i-1]; 
        $ans=[];
        for($i=0; $i<count($nums); $i++) $ans[] = $hashT[$nums[$i]] - $hashTfreq[$nums[$i]]; 
        return $ans;
    }
}
```

## 	N-Repeated Element in Size 2N Array
Problem Link: https://leetcode.com/problems/n-repeated-element-in-size-2n-array/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function repeatedNTimes($nums) {
        $freq = array_count_values($nums); 
        foreach($freq as $k=>$v) if($v==count($nums)/2) return $k; 
    }
}
```

## 	Sum of Unique Elements
Problem Link: https://leetcode.com/problems/sum-of-unique-elements/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumOfUnique($nums) {
        $freq = array_count_values($nums); 
        $ans=0; foreach($freq as $k=>$v) if($v==1) $ans+=$k; 
        return $ans;
    }
}
```

## Unique Number of Occurrences
Problem Link: https://leetcode.com/problems/unique-number-of-occurrences/

```php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr) {
        $freq = array_count_values($arr);
        $unique = array_count_values($freq);
        foreach($unique as $k=>$v) if($v > 1) return false;  
        return true;
    }
}
```

## Subdomain Visit Count
Problem Link: https://leetcode.com/problems/subdomain-visit-count/

```php
class Solution {

    /**
     * @param String[] $cpdomains
     * @return String[]
     */
    function subdomainVisits($cpdomains) {
        $frq=[];
        foreach($cpdomains as $d){
            $domain = explode(" ", $d);
            $c = (int)$domain[0];
            $d1 = $domain[1];
            if(isset($frq[$d1])){
                $frq[$d1]+=$c;
            }else{
                $frq[$d1]=$c;
            }
            $subd = explode(".", $d1);
            if(count($subd)==3){
                $d2 = $subd[1] . "." . $subd[2];
                $d3 = $subd[2]; 
                if(isset($frq[$d2])){
                    $frq[$d2]+=$c;
                }else{
                    $frq[$d2]=$c;
                }  
            }else{
                $d3 = $subd[1]; 
            }
            if(isset($frq[$d3])){
                $frq[$d3]+=$c;
            }else{
                $frq[$d3]=$c;
            }
        }
        $ans=[];
        foreach($frq as $k=>$v){
            $ans[] = $v . " " . $k;
        }
        return $ans;
    }
}
```

## Find Common Characters
Problem Link: https://leetcode.com/problems/find-common-characters/

```php
class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
    function commonChars($words) {
        $freq = array_fill(0,26,[]); 
        foreach($words as $w){
            $freqw = array_count_values(str_split($w));
            for($i=0;$i<26;$i++){
                if(!isset($freqw[chr(97+$i)])){
                    $freq[$i][] = 0;
                }else{
                    $freq[$i][] = $freqw[chr(97+$i)];
                }
            } 
        }
        $ans = "";
        for($i=0; $i<26; $i++)
        {
            $n = min($freq[$i]); $ans .= str_repeat(chr(97+$i), $n);
        }
        echo $ans;
        return $ans?str_split($ans):[];
    }
      
}
```

## 	Find Words That Can Be Formed by Characters
Problem Link: https://leetcode.com/problems/find-words-that-can-be-formed-by-characters/

```php
class Solution {

    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars) {
        $charFrq = array_count_values(str_split($chars)); 
        $ans = 0;
        for($i=0; $i<count($words); $i++){
            $org = $charFrq;
            $form = true; 
            for($j=0; $j<strlen($words[$i]); $j++){ 
                if(!isset($charFrq[$words[$i][$j]]) || !$charFrq[$words[$i][$j]]){
                    $form=false; break;
                }
                else if($charFrq[$words[$i][$j]] > 0) $charFrq[$words[$i][$j]]--; 
            } 
            $charFrq = $org;
            if($form) $ans+=strlen($words[$i]); 
        }
        return $ans;
    }
}
```

## Island Perimeter
Problem Link: https://leetcode.com/problems/island-perimeter/

```php
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid) {
        for($i=0; $i<count($grid); $i++){
            for($j=0; $j<count($grid[$i]); $j++){
                if($grid[$i][$j]==1){
                  $grid[$i][$j] = 4;
                    if($i>0){
                        if($grid[$i-1][$j]!=0){
                            $grid[$i][$j]--;
                            $grid[$i-1][$j]--;
                        }
                    }
                    if($j>0){
                        if($grid[$i][$j-1]!=0){
                            $grid[$i][$j]--;
                            $grid[$i][$j-1]--;
                        }
                    }  
                }
            }
        }
        $ans = 0;
        for($i=0; $i<count($grid); $i++)
            for($j=0; $j<count($grid[$i]); $j++)
                $ans+=$grid[$i][$j];
        return $ans;
    }
}
```

## Single Number
Problem Link: https://leetcode.com/problems/single-number/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $frq = array_count_values($nums);
        foreach($frq as $k=>$v){
            if($v==1) return $k;
        }
    }
}
```
