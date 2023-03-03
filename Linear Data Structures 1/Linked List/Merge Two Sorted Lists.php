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