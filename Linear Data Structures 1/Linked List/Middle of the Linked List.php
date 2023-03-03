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