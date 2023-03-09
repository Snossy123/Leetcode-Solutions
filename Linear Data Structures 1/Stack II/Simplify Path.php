class Solution {

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path) {
        $path = explode("/",$path);
        $stack = [];
        for($i=0;$i<count($path);$i++)
        {
            if($path[$i]=="..")
            {
                array_pop($stack);
            }
            elseif($path[$i]!="." && $path[$i]!="")
            {
                array_push($stack,$path[$i]);
            }
        }
        $result = implode("/",$stack);
        return "/".$result;
    }
}