class Solution {

    /**
     * @param Integer[][] $image
     * @return Integer[][]
     */
    function flipAndInvertImage($image) {
        $newImage = [];
        foreach($image as $row){
            $newrow = [];
            for($i = count($row)-1; $i>-1; $i--){
                $newrow[] = $row[$i] ? 0:1;
            }
            $newImage[] = $newrow;
        }
        return $newImage;
    }
}