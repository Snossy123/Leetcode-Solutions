class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $row = [];
        if($rowIndex < 0){
            return [];
        }
        $row[] = 1;
        for($i=1; $i<=$rowIndex; $i++){
            for($j=count($row)-1; $j>0; $j--){
                $row[$j] = $row[$j] + $row[$j-1];
            }
            $row[] = 1;
        }
        return $row;
    }
}