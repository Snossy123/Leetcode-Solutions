## Shuffle String
Problem Link: https://leetcode.com/problems/shuffle-string/

```javascript
/**
 * @param {string} s
 * @param {number[]} indices
 * @return {string}
 */
var restoreString = function(s, indices) {
    let ans=Array(indices.length).fill('a');
    for(let i=0; i<indices.length; i++){
        ans[indices[i]] = s[i];
    } 
    return ans.join('');
};
```

## Sorting the Sentence
Problem Link: https://leetcode.com/problems/sorting-the-sentence/

```javascript
/**
 * @param {string} s
 * @return {string}
 */
var sortSentence = function(s) {
    let arr = s.split(' ');
    let ans = Array(arr.length).fill("a");
    for(let i=0; i<arr.length; i++){
        let len = arr[i].length-1;
        let num = isNaN(arr[i][len-2])? isNaN(arr[i][len-1])?len:len-1:len-2;
        ans[Number(arr[i].slice(num))-1] = arr[i].slice(0, num);
    }
    return ans.join(' ');
};
```

## Increasing Decreasing String
Problem Link: https://leetcode.com/problems/increasing-decreasing-string/

```javascript
/**
 * @param {string} s
 * @return {string}
 */
var sortString = function(s) {
    let lettersFrq =Array(26).fill(0);
    for(let i=0; i<s.length; i++){
        lettersFrq[s[i].charCodeAt(0) - 97]++;
    } 
    let ans = "";
    let f=true;
    while(f){
        f = false;
        for(let i=0; i<26; i++){
            if(lettersFrq[i] != 0){
                f = true;
                lettersFrq[i]--;
                ans += String.fromCharCode(i+97);
            }
        } 
        for(let i=25; i>=0; i--){
            if(lettersFrq[i] != 0){
                f = true;
                lettersFrq[i]--;
                ans += String.fromCharCode(i+97);
            }
        } 
    } 
    return ans;
};
```

## 	Minimum Subsequence in Non-Increasing Order
Problem Link: https://leetcode.com/problems/minimum-subsequence-in-non-increasing-order/

```javascript
/**
 * @param {number[]} nums
 * @return {number[]}
 */
var minSubsequence = function(nums) {
    nums.sort((a,b)=>b-a);
    let total = nums.reduce((acc, curr)=> acc+curr);
    let curr = 0;
    let ans = [];
    while(curr <= total - curr){
        let num = nums.shift();
        ans.push(num);
        curr += num;
    } 
    return ans;
};
```

## 	Sort Array By Parity II
Problem Link: https://leetcode.com/problems/sort-array-by-parity-ii/

```javascript
/**
 * @param {number[]} nums
 * @return {number[]}
 */
var sortArrayByParityII = function(nums) {
    let ans = Array(nums.length).fill(0);
    let even=0, odd=1;
    for(let i=0; i<nums.length; i++){
        if(nums[i]%2==0){
            ans[even]=nums[i]; even+=2;
        }else{
            ans[odd]=nums[i]; odd+=2;
        }
    }return ans;
};
```

## Can Make Arithmetic Progression From Sequence
Problem Link: https://leetcode.com/problems/can-make-arithmetic-progression-from-sequence/

```javascript
/**
 * @param {number[]} arr
 * @return {boolean}
 */
var canMakeArithmeticProgression = function(arr) {
    arr.sort((a,b)=>a-b);
    let dif = arr[1]-arr[0];
    for(let i=1; i<arr.length-1; i++)
        if(arr[i+1]-arr[i]!=dif)return false;
    return true;
};
```

## Two Sum II - Sort Integers by The Number of 1 Bits
Problem Link: https://leetcode.com/problems/sort-integers-by-the-number-of-1-bits/

```javascript
function countOnes(num){
    let binaryStr = num.toString(2);
    let arr = binaryStr.match(/1/g);
    return arr? arr.length:0;
}1
/**
 * @param {number[]} arr
 * @return {number[]}
 */
var sortByBits = function(arr) {
    let dict = [];
    for(let i=0; i<arr.length; i++) dict.push([countOnes(arr[i]), arr[i]]);
    dict.sort((a,b)=>{
        if(a[0] < b[0]) return -1;
        if(a[0] > b[0]) return 1;
        if(a[1] < b[1]) return -1;
        if(a[1] > b[1]) return 1;
    });
    let ans=[];
    for(let i=0; i<arr.length; i++) ans.push(dict[i][1]);
    return ans;
};
```

## Maximum Units on a Truck
Problem Link: https://leetcode.com/problems/maximum-units-on-a-truck/

```javascript
/**
 * @param {number[][]} boxTypes
 * @param {number} truckSize
 * @return {number}
 */
var maximumUnits = function(boxTypes, truckSize) {
    boxTypes.sort((a,b)=>b[1]-a[1]);
    let ans = 0;
    for(let i=0; i<boxTypes.length; i++){
        if(truckSize > 0){
            let min = Math.min(truckSize, boxTypes[i][0]);
            ans += min * boxTypes[i][1];
            truckSize -= min
        }else break;
    }
    return ans;
};
```

## 	Matrix Cells in Distance Order
Problem Link: https://leetcode.com/problems/matrix-cells-in-distance-order/

```javascript
/**
 * @param {number} rows
 * @param {number} cols
 * @param {number} rCenter
 * @param {number} cCenter
 * @return {number[][]}
 */
var allCellsDistOrder = function(rows, cols, rCenter, cCenter) { 
    let ans = [];
    for(let r=0; r<rows; r++){
        for(let c=0; c<cols; c++){
            let dist = Math.abs(r-rCenter) + Math.abs(c-cCenter);
            ans.push([dist, [r, c]]);
        }
    }
    ans.sort((a,b)=>a[0]-b[0]);
    finalAns = [];
    for(let i=0; i<ans.length; i++) finalAns.push(ans[i][1]); 
    return finalAns;
};
```

## Relative Sort Array
Problem Link: https://leetcode.com/problems/relative-sort-array/

```javascript
/**
 * @param {number[]} arr1
 * @param {number[]} arr2
 * @return {number[]}
 */
var relativeSortArray = function(arr1, arr2) {
    let freq = Array(1001).fill(0);
    for(let i=0; i<arr1.length; i++){
        freq[arr1[i]]++;
    } 
    let ans = [];
    for(let j=0; j<arr2.length; j++){ 
        ans = ans.concat(Array(freq[arr2[j]]).fill(arr2[j])); 
        freq[arr2[j]] = 0;
    }
    for(let j=0; j<1001; j++){
        if(freq[j] > 0){
            ans = ans.concat(Array(freq[j]).fill(j));
            freq[j] = 0;
        }
    }
    return ans;
};
```
