/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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