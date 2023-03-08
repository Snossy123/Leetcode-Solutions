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