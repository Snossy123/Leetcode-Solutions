/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

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