## fair candy swap
Problem Link: https://leetcode.com/problems/fair-candy-swap/

```php
class Solution {

    /**
     * @param Integer[] $aliceSizes
     * @param Integer[] $bobSizes
     * @return Integer[]
     */
    function fairCandySwap($aliceSizes, $bobSizes) {
        $sumalice =array_sum($aliceSizes);
        $sumbob =array_sum($bobSizes);
        $need = ($sumalice + $sumbob) /2;
        $dic = [];
        for($j=0; $j<count($bobSizes); $j++){
            if(isset($dic[$bobSizes[$j]])){
                $dic[$bobSizes[$j]]++;
            }else{
                $dic[$bobSizes[$j]] = 1;
            }
        }
        

        for($i=0; $i<count($aliceSizes); $i++){ 
            $x = $need - ($sumalice - $aliceSizes[$i]); 
            if(isset($dic[$x])){
                return [$aliceSizes[$i], $x];
            }   
        }
        return [];
    }
}
```

## find the distance value between two arrays
Problem Link: https://leetcode.com/problems/find-the-distance-value-between-two-arrays/

```php
class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @param Integer $d
     * @return Integer
     */
    function findTheDistanceValue($arr1, $arr2, $d) {
        $ans = 0;
        for($i=0; $i<count($arr1); $i++){
            for($j=0; $j<count($arr2); $j++){
                $diff = abs($arr1[$i] - $arr2[$j]);
                if($diff <= $d){
                    $ans++;
                    break;
                }
            }    
        }
        return count($arr1) - $ans;
    }
}
```

## longer contiguous segments of ones than zeros
Problem Link: https://leetcode.com/problems/longer-contiguous-segments-of-ones-than-zeros/

```php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkZeroOnes($s) {
        $l0=0;
        $l1=0;
        $s0=0;
        $s1=0;
        for($i=0; $i<strlen($s); $i++){
            if($s[$i]){
                if(!$s0){
                    $s1++;
                }else{
                    if($l1<$s1){
                        $l1 = $s1;
                    }
                    $s1=1;
                    if($l0<$s0){
                        $l0 = $s0;
                    }
                    $s0=0;
                }
            }else{
                if(!$s1){
                    $s0++;
                }else{
                    if($l0<$s0){
                        $l0 = $s0;
                    }
                    $s0=1;
                    
                    if($l1<$s1){
                        $l1 = $s1;
                    }
                    $s1=0;
                }

            } 
        }
        if($l1<$s1){
            $l1 = $s1;
        } 
        if($l0<$s0){
            $l0 = $s0;
        }
        return $l1 > $l0 ? true:false;
    }
}
```

## 	minimum changes to make alternating binary string
Problem Link: https://leetcode.com/problems/minimum-changes-to-make-alternating-binary-string/

```php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minOperations($s) {
        $ss = $s;
        $ans = 0;
        for($i=1; $i<strlen($s); $i++){
            if($s[$i-1] == $s[$i]){
                $ans++;
                $s[$i] = $s[$i]? '0':'1'; 
            }
        }
        $ans2 = 1;
        $ss[0] = $s[0]? '0':'1';
        for($i=1; $i<strlen($ss); $i++){
            if($ss[$i-1] == $ss[$i]){
                $ans2++;
                $ss[$i] = $ss[$i]? '0':'1'; 
            }
        }
        return min($ans, $ans2);
    }
}
```

## 	minimum distance to the target element
Problem Link: https://leetcode.com/problems/minimum-distance-to-the-target-element/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @param Integer $start
     * @return Integer
     */
    function getMinDistance($nums, $target, $start) {
        $min = 1004;
        for($i=0; $i<count($nums); $i++){
            if($nums[$i] == $target && abs($i - $start) < $min){
                $min = abs($i - $start);
            }
        }
        return $min;
    }
}
```

## move zeroes
Problem Link: https://leetcode.com/problems/move-zeroes/

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $n = count($nums);
        for($i=0; $i<$n; $i++){
            if(!$nums[$i]){
                unset($nums[$i]);
                $nums[] = 0;
            }
        }
        return $nums;
    }
}
```

## number of students unable to eat lunch
Problem Link: https://leetcode.com/problems/number-of-students-unable-to-eat-lunch/

```php
class Solution {

    /**
     * @param Integer[] $students
     * @param Integer[] $sandwiches
     * @return Integer
     */
    function countStudents($students, $sandwiches) {
        $one=0;
        $zero=0;
        for($k=0; $k<count($students); $k++){
          
            if($students[$k]){
                $one++;
            }else{
                $zero++;
            }
        }
        echo $one;
        echo $zero;
        for($i=0; count($sandwiches); $i++){
            if(($sandwiches[$i] == 1 && !$one) || ($sandwiches[$i] == 0 && !$zero)){
                return count($sandwiches) - $i;
            }else{
                if($sandwiches[$i]){
                    $one--;
                }else{
                    $zero--;
                }
            }
        }
    }
}
```

## reshape the matrix
Problem Link: https://leetcode.com/problems/reshape-the-matrix/

```php
class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer $r
     * @param Integer $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c) {
        if((count($mat) * count($mat[0]))!=($r * $c)){
            return $mat;
        }
        $x=0;
        $ans = [];
        $row = [];
        for($i=0;$i<count($mat); $i++){
            for($j=0;$j<count($mat[0]); $j++){
                $x++;
                $row[] = $mat[$i][$j];
                if($x % $c == 0){
                    $ans[] = $row;
                    $row = [];
                }
            }
        }
        return $ans;
    }
}
```

## 	special positions in a binary matrix
Problem Link: https://leetcode.com/problems/special-positions-in-a-binary-matrix/

```php
class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSpecial($mat) {
        $rowsum = [];
        $colsum = [];
        for($i=0;$i<count($mat); $i++){
            $rowsum[] = array_sum($mat[$i]); 
        }
        for($i=0;$i<count($mat[0]); $i++){ 
            $cs = 0;
            for($j=0;$j<count($mat); $j++){
                $cs += $mat[$j][$i];
            }
            $colsum[] = $cs;
        }
        var_dump($rowsum);
        var_dump($colsum);
        $ans = 0;
        for($i=0;$i<count($mat); $i++){
            for($j=0;$j<count($mat[0]); $j++){
                if($mat[$i][$j] && $rowsum[$i] == $colsum[$j] && $colsum[$j]==1){
                    $ans++;
                }
            }
        }
        return $ans;
    }
}
```

## transpose matrix
Problem Link: https://leetcode.com/problems/transpose-matrix/

```php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function transpose($matrix) {
        $ans = [];
        for($i=0;$i<count($matrix[0]); $i++){ 
            $c = [];
            for($j=0;$j<count($matrix); $j++){
                $c[]= $matrix[$j][$i];
            }
            $ans[] = $c;
        }
        return $ans;
    }
}
```
