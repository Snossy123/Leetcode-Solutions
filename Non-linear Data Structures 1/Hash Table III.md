## Find Duplicate File in System
Problem Link: https://leetcode.com/problems/find-duplicate-file-in-system/

```php
class Solution {

    /**
     * @param String[] $paths
     * @return String[][]
     */
    function findDuplicate($paths) {
        // content => path
        $dic = [];
        foreach($paths as $path){
            $arr = explode(" ", $path);
            $p = $arr[0];
            for($i=1; $i<count($arr); $i++){
                $arr2 = explode("(", $arr[$i]);
                $fName = $arr2[0];
                $content = substr($arr2[1], 0, strlen($arr2[1])-1);
                $filepath = $p . '/' . $fName;
                if(isset($dic[$content])){
                    $dic[$content][] = $filepath;
                }else{
                    $dic[$content] = [$filepath];
                }
            }
        } 
        $ans=[];
        foreach($dic as $k=>$v){
            if(count($v)>1)
                $ans[]=$v;
        }
        return $ans;
    }
}
```

## Flip Columns For Maximum Number of Equal Rows
Problem Link: https://leetcode.com/problems/flip-columns-for-maximum-number-of-equal-rows/description/

```php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function maxEqualRowsAfterFlips($M) {
        $map = array();

        foreach ($M as &$r) {
            // generate the pattern for the current row
            $s = str_repeat('T', count($r));
            for ($i = 1; $i < count($r); $i++) {
                if ($r[$i] != $r[0]) $s[$i] = 'F';
            }
            // put the pattern to map
            if (!isset($map[$s])) {
                $map[$s] = 0;
            }
            $map[$s]++;
        }

        // find the highest freq of the pattern
        $ans = 0;
        foreach ($map as $p) {
            $ans = max($ans, $p);
        }

        return $ans;
    }
}
```

## Group Anagrams
Problem Link: https://leetcode.com/problems/intersection-of-two-arrays-ii/

```php
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $dic = [];
        foreach($strs as $s){
            $arr = str_split($s);
            sort($arr);
            $org = implode('', $arr);
            if(isset($dic[$org])){
                $dic[$org][] = $s;
            }else{
                $dic[$org] = [$s];
            }
        }
        $ans = [];
        foreach($dic as $k=>$v){
            $ans[] = $v;
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

## 	Replace Words
Problem Link: https://leetcode.com/problems/replace-words/

```php
class Solution {

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence) {
        $dic = [];
        foreach($dictionary as $d) $dic[$d] = true;
        $arr = explode(' ', $sentence);
        $ans = [];
        foreach($arr as $w){
            for($i=1; $i<strlen($w); $i++){
                $s = substr($w, 0, $i); 
                if(isset($dic[$s])){
                    $w = $s; break;
                }                
            }
            $ans[]=$w;
        }
        return implode(' ', $ans);
    }
}
```

##  Sum of Beauty of All Substrings
Problem Link: https://leetcode.com/problems/sum-of-beauty-of-all-substrings/

```php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function beautySum($s) {
        $ans = 0;
        for($i=0; $i<strlen($s)-2; $i++){
            $arr=[];
            for($j=$i; $j<strlen($s); $j++){
                if(isset($arr[$s[$j]])){$arr[$s[$j]]++;}
                else{$arr[$s[$j]]=1;}
                $ans+= max(array_values($arr)) - min(array_values($arr));
            }
        }
        return $ans;
    }
} 
```

## Tuple with Same Product
Problem Link: https://leetcode.com/problems/tuple-with-same-product/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function tupleSameProduct($nums) {
        $prd = [];$res=0;
        for($i=0; $i<count($nums); $i++){
            for($j=0; $j<$i; $j++){
                $prod = $nums[$i] * $nums[$j];
                $res += 8*$prd[$prod];
                ++$prd[$prod];
            }
        }
        return $res;
    }
}
```

## Rabbits in Forest
Problem Link: https://leetcode.com/problems/rabbits-in-forest/description/

```php
class Solution {
    public function numRabbits($answers) {
        if (count($answers) == 0) return 0;
        
        $map = array();
        $sum = 0;
        
        // For each rabbit's answer
        foreach ($answers as $i) {
            if ($i == 0) {
                $sum += 1;
                continue;
            }
            
            if (!isset($map[$i])) {
                // If we haven't accounted for this rabbit color then account for the one telling us
                // as well as the one that rabbit says is that color.
                $map[$i] = 0;
                $sum += ($i + 1);
            } else {
                $map[$i] = $map[$i] + 1;
                // If there are k of each color then they are all present, remove them to allow the change to account for others.
                if ($map[$i] == $i) { 
                    unset($map[$i]);
                }
            }
        }
        return $sum;
    }
}

```

## 	Implement Magic Dictionary
Problem Link: https://leetcode.com/problems/implement-magic-dictionary/description/

```php
class MagicDictionary {
    private $dic;

    public function __construct() {
        // Initialize your data structure here.
        $this->dic = array();
    }

    public function buildDict($dictionary) {
        $this->dic = array_flip($dictionary);
    }

    public function search($searchWord) {
        foreach ($this->dic as $word => $index) {
            if (strlen($word) == strlen($searchWord)) {
                $diff = 0;
                for ($i = 0; $i < strlen($word); $i++) {
                    if ($word[$i] != $searchWord[$i]) {
                        $diff++;
                    }
                }
                if ($diff == 1) {
                    return true;
                }
            }
        }
        return false;
    }
}
```

## 4Sum II
Problem Link: https://leetcode.com/problems/4sum-ii/

```php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer[] $nums3
     * @param Integer[] $nums4
     * @return Integer
     */
    function fourSumCount($nums1, $nums2, $nums3, $nums4) {
      $res = 0;
      $DP = [];
      for($i=0; $i<count($nums1); $i++){
          for($j=0; $j<count($nums2); $j++){
              if(!isset($DP[$nums1[$i] + $nums2[$j]]))
                $DP[$nums1[$i] + $nums2[$j]] = 1;
              else
                $DP[$nums1[$i] + $nums2[$j]] += 1;
          }
      } 
      for($k=0; $k<count($nums3); $k++){
        for($l=0; $l<count($nums4); $l++){ 
          if(isset($DP[-1*($nums3[$k] + $nums4[$l])])) 
            $res+=$DP[-1*($nums3[$k] + $nums4[$l])]; 
        }
      }
      return $res;
    }
}
```
## Time Based Key-Value Store
Problem Link: https://leetcode.com/problems/time-based-key-value-store/

```php
class TimeMap {
    private $time_map;

    public function __construct() {
        $this->time_map = array();
    }

    public function set($key, $value, $timestamp) {
        // Insert new key (if not present), then add timestamped value
        if (!isset($this->time_map[$key])) {
            $this->time_map[$key] = array();
        }
        array_push($this->time_map[$key], array($timestamp, $value));
    }

    public function get($key, $timestamp) {
        // There are several cases that we need to handle;
        // PHP's binary search is not built-in, so we can use custom implementation
        if (isset($this->time_map[$key])) {
            $tv = $this->time_map[$key];
            $left = 0;
            $right = count($tv) - 1;

            while ($left <= $right) {
                $mid = floor(($left + $right) / 2);
                if ($tv[$mid][0] == $timestamp) {
                    return $tv[$mid][1];
                } elseif ($tv[$mid][0] < $timestamp) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }

            // Special case for i == 0 is treated explicitly
            if ($right >= 0) {
                return $tv[$right][1];
            } else {
                return "";
            }
        }
        return "";
    }
}

```
