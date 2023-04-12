## convert binary number in a linked list to integer
Problem Link: https://leetcode.com/problems/convert-binary-number-in-a-linked-list-to-integer/

```php
class Solution {

    /**
     * @param ListNode $head
     * @return Integer
     */
    function getDecimalValue($head) {
        $s = '';
        while($head != null){
            $s .= (string)$head->val;
            $head = $head->next;
        }
        return bindec($s);
    }
}
```

## 	delete node in a linked list
Problem Link: https://leetcode.com/problems/delete-node-in-a-linked-list/

```php
class Solution {
    /**
     * @param ListNode $node
     * @return 
     */
    function deleteNode($node) {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
        return $node;
    }
}
```

## 	linked list cycle
Problem Link: https://leetcode.com/problems/linked-list-cycle/

```php
class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $first = true;
        for($i = $head, $j = $head; $i != null && $j != null; $i = $i->next, $j = $j->next, $j = $j->next){
            if(!$first && $i === $j){
                return true;
            }   
            $first = false;         
        }
         return false;
    }
}
```

## 	merge two sorted lists
Problem Link: https://leetcode.com/problems/merge-two-sorted-lists/

```php
class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        $dummey = new ListNode;
        $head = $dummey;
        while($list1!=null && $list2!=null){
            if($list1->val < $list2->val){
                $head->next = $list1;
                $head = $list1;
                $list1 = $list1->next;
            }else{
                $head->next = $list2;
                $head = $list2;
                $list2 = $list2->next;
            } 
        }
        var_dump($dummey->next);
        while($list1!=null){
                $head->next = $list1;
                $head = $list1;
                $list1 = $list1->next;

        }
        var_dump($dummey->next);
        while($list2!=null){ 
            $head->next = $list2;
            $head = $list2;
            $list2 = $list2->next;
        }
        var_dump($dummey->next);
        return $dummey->next;
    }
}
```

## 	middle of the linked list
Problem Link: https://leetcode.com/problems/middle-of-the-linked-list/

```php
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head) {
        $len = 0;
        for($i = $head; $i != null; $i = $i->next){
            $len++;
        }
        $mid =  $len%2==0? ($len / 2)+1:($len+1)/2;
        $len = 0;
        for($i = $head; $i != null; $i = $i->next){
            $len++;
            if($len==$mid){
                return $i;
            }
        }
    }
}
```

## next greater node in linked list
Problem Link: https://leetcode.com/problems/next-greater-node-in-linked-list/

```php
class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function nextLargerNodes($head) {
        $ans = [];
        $arr = [];
        for($temp = $head; $temp != null; $temp = $temp->next){
            $arr[] = $temp->val;
            $ans[] = 0;
        }    
 
        $stack = [];
        for($i=0;$i<count($arr); $i++){
            while(count($stack) && $arr[$stack[count($stack)-1]] < $arr[$i])
            {
                $ans[array_pop($stack)] = $arr[$i];
            }
            $stack[] = $i; 
        }
        return $ans;
         
    }
}
```

## 	remove duplicates from an unsorted linked list
Problem Link: https://leetcode.com/problems/remove-duplicates-from-an-unsorted-linked-list/

```php
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        $prev = $head;
        $curr = $head->next;
        while($curr != null){

            if($prev->val == $curr->val){ 
                $prev->next = $curr->next;
                $curr = $prev->next; 
            
            }else{
                $prev = $curr;
                $curr = $prev->next;
            } 
        }
        return $head;
    }
}
```

## remove linked list elements
Problem Link: https://leetcode.com/problems/remove-linked-list-elements/

```php
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val) {
        $dummy = new ListNode;
        $dummy->next = $head;
        $prev = $dummy;
        $curr = $head;
        while($curr != null){
            if($curr->val == $val){ 
                $prev->next = $curr->next;
                $curr = $prev->next;
            }else{
                $prev = $curr;
                $curr = $prev->next;
            }
        }
        return $dummy->next;
    }
}
```

## 	reverse linked list
Problem Link: https://leetcode.com/problems/reverse-linked-list/

```php
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $prev = null;
        $curr = $head;
        while($curr!=null){
            $temp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $temp;
        }
        return $prev;
    }
}
```

## swapping nodes in a linked list
Problem Link: https://leetcode.com/problems/swapping-nodes-in-a-linked-list/

```php
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function swapNodes($head, $k) {
        $tail = $head;
        $len = 0;
        $start = 0;
        $start_node = null;
        while($tail != null){
            $len++;
            $start++;
            if($start == $k){
                $start_node = $tail;
            }
            $tail = $tail->next;
        }
        $tail = $head; 
        $start = 0;
        $last_node = null;
        while($tail != null){
            $start++;
            if($start == $len-$k+1){
                $last_node = $tail;
                break;
            }
            $tail = $tail->next;
        }
        $temp = $start_node->val;
        $start_node->val = $last_node->val;
        $last_node->val = $temp;
        return $head;
    }
}
```
