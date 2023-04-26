## Arranging Coins
Problem Link: https://leetcode.com/problems/arranging-coins/description/

```javascript
/**
 * @param {number} n
 * @return {number}
 */
var arrangeCoins = function(n) {
    let s = 1;
    let end = n;
    let mid = Math.floor((s+end)/2);
    while(s<=end){
        let midfilled = mid*(mid+1)/2;
        if(midfilled===n)return mid;
        else if(midfilled<n) s=mid+1;
        else end = mid-1;
        mid = Math.floor((s+end)/2);
    }
    return s-1;
};
```

## Search Insert Position
Problem Link: https://leetcode.com/problems/search-insert-position/description/

```javascript
/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number}
 */
var searchInsert = function(nums, target) {
    let s = 0;
    let end = nums.length-1;
    let mid = Math.floor((s+end)/2);
    while(nums[mid]!==target && s<=end){ 
        if(nums[mid]>target) end = mid-1;
        else s=mid+1;
        mid = Math.floor((s+end)/2);
    }  
    return mid===-1?0:nums[mid]===target?mid:nums[mid]<target?mid+1:mid-1;
};
```

## Guess Number Higher or Lower
Problem Link: https://leetcode.com/problems/guess-number-higher-or-lower/description/

```javascript
/** 
 * Forward declaration of guess API.
 * @param {number} num   your guess
 * @return 	     -1 if num is higher than the picked number
 *			      1 if num is lower than the picked number
 *               otherwise return 0
 * var guess = function(num) {}
 */

/**
 * @param {number} n
 * @return {number}
 */
var guessNumber = function(n) {
    let s = 1;
    let end = n;
    let mid = Math.floor((s+end)/2);
    while(guess(mid)!==0 && s<=end){
        if(guess(mid)===1) s=mid+1;
        else end = mid-1;
        mid = Math.floor((s+end)/2);
    }
    return guess(mid)===0?mid:-1;
};
```

## 	Find Smallest Letter Greater Than Target
Problem Link: https://leetcode.com/problems/find-smallest-letter-greater-than-target/description/

```javascript
function bs(arr, trg){
    let s = 0;
    let end = arr.length-1;
    let mid = Math.floor((s+end)/2);
    while(arr[mid]!==trg && s<=end){
        if(arr[mid]<trg) s=mid+1;
        else end = mid-1;
        mid = Math.floor((s+end)/2);
    }
    return arr[mid]===trg?mid:-1;
}
/**
 * @param {character[]} letters
 * @param {character} target
 * @return {character}
 */
var nextGreatestLetter = function(letters, target) { 
    for(var i=target.charCodeAt(0)-97+1; i<26; i++){
        let ch = bs(letters, String.fromCodePoint(i+97));
        if(ch !== -1) return String.fromCodePoint(i+97); 
    }
    return letters[0];
};
```

## 	Binary Search
Problem Link: https://leetcode.com/problems/binary-search/description/

```javascript
function bs(arr, trg){
    let s = 0;
    let end = arr.length;
    let mid = Math.floor((s+end)/2);
    while(arr[mid]!==trg && s<=end){
        if(arr[mid]<trg) s=mid+1;
        else end = mid-1;
        mid = Math.floor((s+end)/2);
    }
    return arr[mid]===trg?mid:-1;
}
/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number}
 */
var search = function(nums, target) {
    return bs(nums, target);
};
```

## Is Subsequence
Problem Link: https://leetcode.com/problems/is-subsequence/description/

```javascript
/**
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isSubsequence = function(s, t) {
    let x = -1, c=0;
    for(var i=0; i<s.length; i++){ 
        for(var j=x+1; j<t.length; j++){
            if(s[i] === t[j]){
                x = j; // start t string from next
                c++; // how many characters are matched
                break;
            }
        }
    }
    return c===s.length??false;
};
```

## Two Sum II - Input Array Is Sorted
Problem Link: https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/description/

```javascript
function bs(arr, target){ 
    var st = 0;
    var end = arr.length-1;
    var mid = Math.floor((st+end)/2); 
    while(arr[mid] !== target && st <= end){ 
        if(arr[mid] < target){ 
            st = mid+1;
        }else end = mid-1;
        mid = Math.floor((st+end)/2);
    } 
    return arr[mid]===target? mid:-1;
}
/**
 * @param {number[]} numbers
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function(numbers, target) {
    for(var i=0; i<numbers.length; i++){
        let temp = numbers;
        let rest = target-numbers[i]
        temp[i] = -10032; 
        let ans = bs(temp, rest); 
        if(ans === -1) continue;
        return [i+1, ans+1];
    }
};
```

## Peak Index in a Mountain Array
Problem Link: https://leetcode.com/problems/peak-index-in-a-mountain-array/description/

```javascript
/**
 * @param {number[]} arr
 * @return {number}
 */
var peakIndexInMountainArray = function(arr) {
    var st = 0;
    var end = arr.length-1;
    var mid = Math.floor((st+end)/2); 
    while(st <= end){ 
        if(mid===0) st = mid+1;
        else if(arr[mid-1] < arr[mid] && arr[mid] > arr[mid+1]) return mid;
        else if(arr[mid-1] <= arr[mid] && arr[mid] <= arr[mid+1]) st = mid+1;
        else end = mid-1;
        mid = Math.floor((st+end)/2);
    } 
    return arr[mid];
};
```

## 	The K Weakest Rows in a Matrix
Problem Link: https://leetcode.com/problems/the-k-weakest-rows-in-a-matrix/description/

```javascript
class Node{
    constructor(row, power){
        this.row = row;
        this.power = power;
    }
}
class minBinaryHeap{
    constructor(){
        this.heap = [];
    }
    insert(val){ 
        this.heap.push(val);
        this.bubbleUP(); 
    }
    bubbleUP(){
        var i=this.heap.length-1;
        var ele = this.heap[i];
        while(i>0){
            var j = Math.floor((i-1)/2);
            var par = this.heap[j];
            if(par.power<ele.power || (par.power===ele.power && par.row<ele.row)) break;
            this.heap[j] = ele;
            this.heap[i] = par;
            i=j;
        }
    }
    getMin(){
        let min = this.heap[0];
        let last = this.heap.pop();
        if(this.heap.length>0){
            this.heap[0] = last;
            this.sinkDown();
        }
        return min;
    }
    sinkDown(){
        var i=0;
        var ele = this.heap[i];
        var len = this.heap.length;
        
        while(true){
            let L = i * 2 + 1;
            let R = i * 2 + 2;
            let Lchild, Rchild;
            let swap = null; 
            if(L<len){
                Lchild = this.heap[L];
                if(Lchild.power < ele.power) swap = L; 
                else if (Lchild.power === ele.power && Lchild.row < ele.row) swap = L;
            } 
            if(R<len){
                Rchild = this.heap[R];
                if(swap===null){
                    if(Rchild.power < ele.power) swap = R;
                    else if(Rchild.power === ele.power && Rchild.row < ele.row) swap = R;
                } 
                else if(swap!==null){
                    if(Rchild.power < Lchild.power) swap = R;
                    else if(Rchild.power === Lchild.power && Rchild.row < Lchild.row) swap = R;
                } 
            } 
            if(swap===null) break;
            this.heap[i] = this.heap[swap];
            this.heap[swap] = ele;
            i = swap;
        }
    }
}
function bs(arr, target){
    var st = 0;
    var end = arr.length-1;
    var mid = Math.floor((st+end)/2);
    var last1 = -1;
    while(st <= end){
        if(arr[mid] === 1){
            last1 = mid;
            st = mid+1;
        }else end = mid-1;
        mid = Math.floor((st+end)/2);
    }
    return last1;
}
/**
 * @param {number[][]} mat
 * @param {number} k
 * @return {number[]}
 */
var kWeakestRows = function(mat, k) {
    var MBH = new minBinaryHeap();
    for(var i=0; i<mat.length; i++) MBH.insert(new Node(i, bs(mat[i], 1)+1)); 
    let ans = [];
    for(var i=0; i<k; i++) ans.push(MBH.getMin().row);  
    return ans;
};
```

## Count Negative Numbers in a Sorted Matrix
Problem Link: https://leetcode.com/problems/count-negative-numbers-in-a-sorted-matrix/description/

```javascript
function binarySearch(arr, target){
    var firstAppear = -1;
    var start = 0;
    var end = arr.length - 1;
    var mid = Math.floor((start+end)/2);
    while(start <= end){  
        if(arr[mid] < target) {firstAppear = mid; end = mid-1;}
        else start = mid+1; 
        mid = Math.floor((start+end)/2);
    } 
    return firstAppear; 
}
/**
 * @param {number[][]} grid
 * @return {number}
 */
var countNegatives = function(grid) {
   var count = 0;
   for(var i=0; i<grid.length; i++){ 
       var res = binarySearch(grid[i], 0); 
       if(res!==-1) count+=grid[i].length-res;
   } 
   return count;
};
```
