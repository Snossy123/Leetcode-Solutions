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