## backspace string compare
Problem Link: https://leetcode.com/problems/backspace-string-compare/

```php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        $st = [];
        for($i=0; $i<strlen($s); $i++){
            if($s[$i]=='#'){
                array_pop($st);
            }else{
                $st[]=$s[$i];
            }
        } 
        $st2 = [];
        for($i=0; $i<strlen($t); $i++){
            if($t[$i]=='#'){
                array_pop($st2);
            }else{
                $st2[]=$t[$i];
            }
        }
        var_dump($st);
        var_dump($st2);
        if(count($st)!=count($st2)){return false;}
        for($i=0; $i<min(count($st),count($st2)); $i++){
            if($st[$i]!=$st2[$i]){
                return false;
            }
        }
        return true;
    }
}
```

## binary tree inorder traversal
Problem Link: https://leetcode.com/problems/binary-tree-inorder-traversal/

```php
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public $res=[];
    function inorder($root){
        if($root == null)
            return; 
        $this->inorder($root->left); 
        $this->$res[] = $root->val; 
        $this->inorder($root->right);        
    }
    function inorderTraversal($root) {
        $this->inorder($root); 
        $ans = [];
        foreach($this->$res as $i){
            $ans[] = $i;
        } 
        return $ans;
    }
}
```

## binary tree preorder traversal
Problem Link: https://leetcode.com/problems/binary-tree-preorder-traversal/

```php
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public $res = [];
    function preorder($root){
        if($root==null){
            return;
        }
        $this->$res[] = $root->val;
        $this->preorder($root->left);
        $this->preorder($root->right);

    }
    function preorderTraversal($root) {
        $this->preorder($root); 
        $ans = [];
        foreach($this->$res as $i){
            $ans[]=$i;
        }
        return $ans;
    }
}
```

## 	make the string great
Problem Link: https://leetcode.com/problems/make-the-string-great/

```php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeGood($s) {
        $st=[];
        for($i=0; $i<strlen($s);$i++){ 
            if(abs(ord($st[count($st)-1]) - ord($s[$i])) == 32){
                array_pop($st);
            }else{ 
                $st[] = $s[$i];
            }
        }
        $ans="";
        for($i=0; $i<count($st); $i++){
            $ans.=$st[$i];
        }
        return $ans;
    }
}
```

## 	min stack
Problem Link: https://leetcode.com/problems/min-stack/

```php
class MinStack {
    private $stack=array();
    private $min=array();
    /**
     */
    function __construct() { 
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) { 
        $this->stack[] = $val; 
        if(empty($this->min) || $val <= end($this->min)){
            array_push($this->min, $val);
        }
    }
  
    /**
     * @return NULL
     */ 
    function pop() {
        if(end($this->stack) === end($this->min)){
            array_pop($this->min);
        }
        array_pop($this->stack); 
    }
  
    /**
     * @return Integer
     */
    function top() {
        return  end($this->stack);
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return end($this->min);
    }
} 
```

## minimum add to make parentheses valid
Problem Link: https://leetcode.com/problems/minimum-add-to-make-parentheses-valid/

```php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minAddToMakeValid($s) {
        $st = [];
        $ans=0;
        for($i=0; $i<strlen($s);$i++){
            if($s[$i] == '('){
                $st[]=$s[$i];
            }else{
                if(!count($st)){
                    $ans++;
                    continue;
                }else{
                    array_pop($st);
                }
            }
        }
        return $ans+count($st);
    }
}
```

## next greater element i
Problem Link: https://leetcode.com/problems/next-greater-element-i/

```php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function nextGreaterElement($nums1, $nums2) {
        $st=[];
        $dic=[];
        for($i=0; $i<count($nums2); $i++){
            while(count($st)){
                if($st[count($st)-1] < $nums2[$i]){
                    $dic[$st[count($st)-1]] = $nums2[$i];
                    array_pop($st);
                }else{
                    break;
                }
            }
            $st[]=$nums2[$i];
        }
        for($i=0; $i<count($st); $i++){
            $dic[$st[$i]] = -1;
        }
        $ans=[];
        for($i=0; $i<count($nums1); $i++){
            $ans[]=$dic[$nums1[$i]];
        }
        return $ans;
    }
}
```

## remove all adjacent duplicates in string ii
Problem Link: https://leetcode.com/problems/remove-all-adjacent-duplicates-in-string-ii/

```php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeDuplicates($s) {
        $st=[];
        for($i=0;$i< strlen($s);$i++){ 
            if($s[$i] == $st[count($st)-1]){
                array_pop($st);
            }else{
                $st[] = $s[$i];
            }
        } 
        $ans="";
        foreach($st as $i){ 
            $ans.=$i;
        }
        return $ans;
    }
}
```

## 	remove outermost parentheses
Problem Link: https://leetcode.com/problems/remove-outermost-parentheses/

```php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeOuterParentheses($s) {
        $st = [];
        for($c=0; $c<strlen($s); $c++){
            if($s[$c] == '('){
                if(count($st) == 0){
                    $s[$c] = '*';
                }
                $st[] = $s[$c];
            }
            if($s[$c] == ')'){
                if(count($st) == 1){
                    $s[$c] = '*';
                }
                array_pop($st);
            }
        }
        return str_replace('*', '', $s); 
    }
}
```

## reverse substrings between each pair of parentheses
Problem Link: https://leetcode.com/problems/reverse-substrings-between-each-pair-of-parentheses/

```php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseParentheses($s) {
        $st = [];
        for($i=0; $i<strlen($s); $i++){
            if($s[$i] === ')'){
                $sub = []; 
                while(end($st)!=='('){ 
                    $sub[] = end($st);
                    array_pop($st);
                }
                array_reverse($sub);
                array_pop($st);
                foreach($sub as $k){
                    $st[] = $k;
                } 
            }else{
                $st[] = $s[$i];
            }
        }
        $ans = "";
        foreach($st as $n){
            $ans .= $n;
        }
        return $ans;
    }
}
```
