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