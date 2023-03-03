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