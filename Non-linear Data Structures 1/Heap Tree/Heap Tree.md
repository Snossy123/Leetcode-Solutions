## Last Stone Weight
Problem Link: https://leetcode.com/problems/last-stone-weight/

```php
class BinaryHeap{
    public $heap=[];
    function __construct(){}
    function insert($val){
        $this->heap[] = $val;
        // put in right place
        $this->popup();
    }
    function popup(){
        $elementIndx = count($this->heap) - 1;
        $element  =  $this->heap[$elementIndx];
        while($elementIndx > 0){
            $parentIndx = floor(($elementIndx-1)/2);
            $parent = $this->heap[$parentIndx];
            if($parent >= $element) break;
            $this->heap[$elementIndx] = $parent;
            $this->heap[$parentIndx] = $element;
            $elementIndx = $parentIndx;
        }
    }

    function getMax($val){
        $max = $this->heap[0];
        $last = array_pop($this->heap);
        if(!count($this->heap))
        // put in right place
        $this->sinkDown();
    }
    function sinkDown(){
        $elementIndx = count($this->heap) - 1;
        $element  =  $this->heap[$elementIndx];
        while($elementIndx > 0){
            $parentIndx = floor(($elementIndx-1)/2);
            $parent = $this->heap[$parentIndx];
            if($parent >= $element) break;
            $this->heap[$elementIndx] = $parent;
            $this->heap[$parentIndx] = $element;
            $elementIndx = $parentIndx;
        }
    }
}
class Solution {      


    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $BH = new BinaryHeap();
        foreach($stones as $s){
            $BH->insert($s);
        }
        var_dump($BH->heap);
        return 0;                             
    }
}
```

## Kth Largest Element in a Stream
Problem Link: https://leetcode.com/problems/kth-largest-element-in-a-stream/

```php
class KthLargest {
    private $k;
    private $nums = [];
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->k=$k;
        foreach($nums as $n){$this->enqueue($n);} 
        $c = count($this->nums); 
        for($i=1; $i<=$c-$this->k; $i++){$max = $this->dequeue();}  
    }
    function enqueue($val){
        $this->nums[] = $val;
        $this->popup();
    }
    function popup(){
        $i = count($this->nums)-1;
        $curr = end($this->nums);
        while($i>0){
            $j = floor(($i-1)/2);
            $par = $this->nums[$j];
            if($par <= $curr) break;
            $this->nums[$j] = $curr;
            $this->nums[$i] = $par;
            $i = $j; 
        }
    }
    function dequeue(){
        $min = $this->nums[0];
        $last = array_pop($this->nums); 
        if(count($this->nums)>0){ 
            $this->nums[0] = $last;  
            $this->sinkDown();
        }
        return $min;
    }
    function sinkDown(){
        $elementIndx = 0;
        $element  =  $this->nums[0]; 
        $len  =  count($this->nums); 
        while(true){
            $swap = null;
            $L = $elementIndx*2 + 1;
            $R = $elementIndx*2 + 2; 
            if($L < $len && $this->nums[$L] < $element) $swap = $L;
            if($R < $len  && (
                    ($swap===null && $this->nums[$R] < $element) ||
                    ($swap!==null && $this->nums[$R] < $this->nums[$L])
                ) 
            ) $swap = $R; 
            if(!$swap) break;
            $this->nums[$elementIndx] = $this->nums[$swap];
            $this->nums[$swap] = $element;
            $elementIndx = $swap;
        }
    }
    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        $this->enqueue($val);
        if(count($this->nums) > $this->k){
            $_ = $this->dequeue();
        }
        $x = $this->dequeue();
        $this->enqueue($x);
        return $x; 
    }
} 
```

## Seat Reservation Manager
Problem Link: https://leetcode.com/problems/seat-reservation-manager/

```php
class MinBinaryHeap{
    private $heap = [];
    function insert($val){
        $this->heap[] = $val;
        $this->popup();
    }
    function popup(){
        $i = count($this->heap)-1;
        $curr = end($this->heap);
        while($i>0){
            $j = floor(($i-1)/2);
            $par = $this->heap[$j];
            if($par <= $curr) break;
            $this->heap[$j] = $curr;
            $this->heap[$i] = $par;
            $i = $j;
        }
    }

    function getMin(){
        $min = $this->heap[0];
        $last  =array_pop($this->heap);
        if(!empty($this->heap)){
            $this->heap[0] = $last;
            $this->sink();
        }
        return $min;
    }
    function sink(){
        $i = 0;
        $curr = $this->heap[0];
        $len = count($this->heap);
        while(true){
            $L = 2 * $i + 1;
            $R = 2 * $i + 2;
            $swap = null;

            if($L < $len){
                $Lchild = $this->heap[$L];    
                if($Lchild < $curr) $swap = $L;
            }

            if($R < $len){
                $Rchild = $this->heap[$R];
                if($swap === null && $Rchild < $curr) $swap = $R;
                if($swap !== null && $Rchild < $this->heap[$L]) $swap = $R;
            }

            if($swap === null) break;

            $this->heap[$i] = $this->heap[$swap];
            $this->heap[$swap] = $curr;
            $i = $swap;
        }
    }
}
class SeatManager {
    private $MBH;
    /**
     * @param Integer $n
     */
    function __construct($n) {
        $this->MBH = new MinBinaryHeap();
        for($i=1; $i<=$n; $i++) $this->MBH->insert($i);
    }
  
    /**
     * @return Integer
     */
    function reserve() {
        return $this->MBH->getMin();
    }
  
    /**
     * @param Integer $seatNumber
     * @return NULL
     */
    function unreserve($seatNumber) {
        $this->MBH->insert($seatNumber);
    }
}
```

## 	Sort Characters By Frequency
Problem Link: https://leetcode.com/problems/sort-characters-by-frequency/

```php
class Node {
    function __construct($val, $freq){
        $this->val = $val;
        $this->freq = $freq;
    }
}
class PriortyQueue{
    public $que=[];
    
    function insert($element){
        echo $element->val;
        $contain = $this->contain($element->val);
        if($contain == -1) $this->que[] = $element;
        $this->popup($contain==-1?count($this->que)-1:$contain);  
    }
    function contain($val){
        for($i=0; $i<count($this->que); $i++){
            if($this->que[$i]->val === $val)
            {
                $this->que[$i]->freq++;
                return $i;    
            }
        }
        return -1;
    }
    function popup($pos){
        $i = $pos;
        $curr = $this->que[$pos];
        
        while($i>0){
            $j = floor(($i-1)/2);
            $par = $this->que[$j];

            if($par->freq >= $curr->freq) break;
            $this->que[$j] = $curr;
            $this->que[$i] = $par;
            $i = $j;
        }
    }

    function getMax(){
        $max = $this->que[0];
        $last = array_pop($this->que);
        if(!empty($this->que)){
            $this->que[0] = $last;
            $this->sink();
        }
        return $max;
    }
    function sink(){
        $i=0;
        $curr = $this->que[0];
        $len = count($this->que);
        while(true){
            $L = $i * 2 + 1;
            $R = $i * 2 + 2;
            $swap = null;

            if($L < $len){
                $Lchild = $this->que[$L];
                if($Lchild->freq > $curr->freq) $swap = $L;
            }

            if($R < $len){
                $Rchild = $this->que[$R];
                if($swap === null && $Rchild->freq > $curr->freq) $swap = $R;
                if($swap !== null && $Rchild->freq > $this->que[$L]->freq) $swap = $R;
            }

            if($swap === null) break;

            $this->que[$i] = $this->que[$swap];
            $this->que[$swap] = $curr;
            $i = $swap;
        }
    }
}
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s) {
        $PQ = new PriortyQueue();
        for($i=0; $i<strlen($s); $i++){ 
            $node = new Node($s[$i], 1);
            $PQ->insert($node);
        }
        var_dump($PQ->que);  
        $n = count($PQ->que);
        $ans = "";
        for($i=0; $i<$n; $i++){ 
            $curr = $PQ->getMax();  
            $ans .= str_repeat($curr->val, $curr->freq);
        } 
        return $ans;
    }
}
```

## 	K Closest Points to Origin
Problem Link: https://leetcode.com/problems/k-closest-points-to-origin/

```php
class Node{
    function __construct($point, $dist){
        $this->point = $point;
        $this->dist = $dist;
    }
}
class MinBinaryHeap{
    public $heap = [];
    function insert($val){
        $this->heap[] = $val;
        $this->popup();
    }
    function popup(){
        $i = count($this->heap)-1;
        $ele = end($this->heap);
        while($i>0){
            $j=floor(($i-1)/2);
            $par = $this->heap[$j];
            if($par->dist <= $ele->dist) break;
            $this->heap[$i] = $par;            
            $this->heap[$j] = $ele;
            $i = $j;            
        }
    }
    function getMin(){
        $min = $this->heap[0];
        $last = array_pop($this->heap);
        if(!empty($this->heap)){
            $this->heap[0] = $last;
            $this->sink();
        }
        return $min;
    }
    function sink(){
        $i = 0;
        $ele = $this->heap[0];
        $len = count($this->heap);
        while(true){
            $L = $i * 2 + 1;
            $R = $i * 2 + 2;
            $swap = null;

            if($L < $len){
                $Lchild = $this->heap[$L];
                if($Lchild->dist < $ele->dist) $swap = $L;
            }

            if($R < $len){
                $Rchild = $this->heap[$R];
                if($swap === null && $Rchild->dist < $ele->dist) $swap = $R;
                if($swap !== null && $Rchild->dist < $this->heap[$L]->dist) $swap = $R;
            }

            if($swap === null) break;

            $this->heap[$i] = $this->heap[$swap];
            $this->heap[$swap] = $ele;
            $i = $swap;
        }
    }
}
class Solution {

    /**
     * @param Integer[][] $points
     * @param Integer $k
     * @return Integer[][]
     */
    function kClosest($points, $k) {
        $MBH = new MinBinaryHeap();
        foreach($points as $p){
            $dist = sqrt(pow($p[0],2)+pow($p[1],2));
            $node = new Node($p, $dist);
            $MBH->insert($node); 
        } 
        $ans = [];
        for($i=0; $i<$k; $i++){
            $x = $MBH->getMin();
            $ans[] = $x->point;
        }
        return $ans;
    }
}
```

## Top K Frequent Elements
Problem Link: https://leetcode.com/problems/top-k-frequent-elements/

```php
class Node{
    function __construct($val, $freq){
        $this->val = $val;
        $this->freq = $freq;
    }
}
class MaxBinaryHeap{
    public $heap = [];
    function insert($val){ 
        $x = $this->contain($val->val);
        $pos = $x==-1?0:$x;
        if($x == -1)
            $this->heap[] = $val;
        $this->popup($pos);
    }
    function contain($val){
        for($i=0; $i<count($this->heap); $i++){
            if($this->heap[$i]->val == $val){
                $this->heap[$i]->freq++;
                return $i;
            }
        }
        return -1;
    }
    function popup($pos){
        $i = $pos;
        $ele = $this->heap[$pos];
        while($i>0){
            $j=floor(($i-1)/2);
            $par = $this->heap[$j];
            if($par->freq >= $ele->freq) break;
            $this->heap[$i] = $par;            
            $this->heap[$j] = $ele;
            $i = $j;            
        }
    }
    function getMax(){
        $max = $this->heap[0];
        $last = array_pop($this->heap);
        if(!empty($this->heap)){
            $this->heap[0] = $last;
            $this->sink(); 
        } 
        return $max;
    }
    function sink(){
        $i = 0;
        $ele = $this->heap[0];
        $len = count($this->heap);
        while(true){
            $L = $i * 2 + 1;
            $R = $i * 2 + 2;
            $swap = null;
            if($L < $len){
                $Lchild = $this->heap[$L];
                if($Lchild->freq > $ele->freq) $swap = $L; 
            }
            if($R < $len){
                $Rchild = $this->heap[$R];
                if($swap === null && $Rchild->freq > $ele->freq) $swap = $R;
                if($swap !== null && $Rchild->freq > $this->heap[$L]->freq) $swap = $R;
            }
            if($swap === null) break;
            $this->heap[$i] = $this->heap[$swap];
            $this->heap[$swap] = $ele;
            $i = $swap;
        }
    }
}
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $MBH = new MaxBinaryHeap();
        foreach($nums as $n){ 
            $node = new Node($n, 1);
            $MBH->insert($node); 
        } 
        $ans = [];
        for($i=0; $i<$k; $i++){
            $x = $MBH->getMax();
            
            $ans[] = $x->val;
        } 
        return $ans;
    }
}
```

## Maximum Score From Removing Stones
Problem Link: https://leetcode.com/problems/maximum-score-from-removing-stones/

```php
class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function maximumScore($a, $b, $c) {
        $heap = new SplMaxHeap();
        $heap->insert($a);
        $heap->insert($b);
        $heap->insert($c);
        $ans = 0;
        while(true){
            $x = $heap->extract();
            $y = $heap->extract();
            if($x==0 || $y==0) break;
            $ans++;
            $heap->insert($x-1);
            $heap->insert($y-1);
        }
        return $ans;
    }
}
```

## Kth Largest Element in an Array
Problem Link: https://leetcode.com/problems/kth-largest-element-in-an-array/

```php
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        $heap = new SplMaxHeap();
        foreach($nums as $n){
            $heap->insert($n);
        }
        for($i=0; $i<$k-1; $i++){
            $_ = $heap->extract();
        }
        return $heap->extract();
    }
}
```

## 	Kth Smallest Element in a Sorted Matrix
Problem Link: https://leetcode.com/problems/kth-smallest-element-in-a-sorted-matrix/

```php
class Solution {
    /**
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($matrix, $k) {
        $heap = new SplMinHeap();
        for($i=0; $i<count($matrix); $i++){
            for($j=0; $j<count($matrix[$i]); $j++){
                $heap->insert($matrix[$i][$j]);
            }    
        }
        for($n=0; $n<$k-1; $n++){
            $_ = $heap->extract();
        }
        return $heap->extract();
    }
}
```

## Maximum Average Pass Ratio
Problem Link: https://leetcode.com/problems/maximum-average-pass-ratio/

```php
class Node{
    function __construct($class, $delta){
        $this->class = $class;
        $this->delta = $delta;
    }
}
class PriortyQue{
    public $heap = [];
    function insert($val){
        $this->heap[] = $val;
        $this->popup();
    }
    function popup(){
        $i=count($this->heap)-1;
        $curr=end($this->heap);
        while($i>0){
            $j=floor(($i-1)/2);
            $par=$this->heap[$j];
            if($par->delta>=$curr->delta) break;
            $this->heap[$i] = $par;
            $this->heap[$j] = $curr;
            $i=$j;
        }
    }
    function getMax(){
        $max = $this->heap[0];
        $last = array_pop($this->heap);
        if(!empty($this->heap)){
            $this->heap[0] = $last;
            $this->sink();
        }
        return $max; 
    } 
    function sink(){
        $i = 0;
        $curr = $this->heap[0];
        $len = count($this->heap);
        while(true){
            $L = $i * 2 + 1;
            $R = $i * 2 + 2;
            $swap = null;

            if($L < $len){
                $Lchild = $this->heap[$L];
                if($Lchild->delta > $curr->delta) $swap = $L;
            }

            if($R < $len){
                $Rchild = $this->heap[$R];
                if($swap===null && $Rchild->delta > $curr->delta) $swap = $R;
                if($swap!==null && $Rchild->delta > $this->heap[$L]->delta) $swap = $R;
            }

            if($swap === null) break;

            $this->heap[$i] = $this->heap[$swap];
            $this->heap[$swap] = $curr;
            $i=$swap;  
        }
    }
}
class Solution {
    /**
     * @param Integer[][] $classes
     * @param Integer $extraStudents
     * @return Float
     */
    function maxAverageRatio($classes, $extraStudents) {
        $heap = new PriortyQue();
        foreach($classes as $cl){
            $delta = (($cl[0]+1) / ($cl[1]+1)) - ($cl[0]/$cl[1]);  
            $node = new Node($cl, $delta);
            $heap->insert($node);
        }
        for($i=0; $i<$extraStudents; $i++){
            $currMax = $heap->getMax();
            $currMax->class[0]++;
            $currMax->class[1]++;
            $delta = (($currMax->class[0]+1) / ($currMax->class[1]+1)) - 
                        ($currMax->class[0]/$currMax->class[1]);  
            $node = new Node($currMax->class, $delta);
            $heap->insert($node);
        }
        $ans = 0;
        foreach($classes as $cl){
            $currMax = $heap->getMax();
            $p = $currMax->class[0];
            $t = $currMax->class[1];
            $ans += ($p/$t);
        }   
        return $ans/count($classes);
    }
}
```
