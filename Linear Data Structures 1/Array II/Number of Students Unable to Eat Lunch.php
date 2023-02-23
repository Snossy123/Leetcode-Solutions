class Solution {

    /**
     * @param Integer[] $students
     * @param Integer[] $sandwiches
     * @return Integer
     */
    function countStudents($students, $sandwiches) {
        $one=0;
        $zero=0;
        for($k=0; $k<count($students); $k++){
          
            if($students[$k]){
                $one++;
            }else{
                $zero++;
            }
        }
        echo $one;
        echo $zero;
        for($i=0; count($sandwiches); $i++){
            if(($sandwiches[$i] == 1 && !$one) || ($sandwiches[$i] == 0 && !$zero)){
                return count($sandwiches) - $i;
            }else{
                if($sandwiches[$i]){
                    $one--;
                }else{
                    $zero--;
                }
            }
        }
    }
}