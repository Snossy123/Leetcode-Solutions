class Solution {

    /**
     * @param String[] $tokens
     * @return Integer
     */  
    function evalRPN($tokens) {
        $stack = array();
        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                array_push($stack, $token);
            } else {
                $op2 = array_pop($stack);
                $op1 = array_pop($stack);
                switch ($token) {
                    case "+":
                        $result = $op1 + $op2;
                        break;
                    case "-":
                        $result = $op1 - $op2;
                        break;
                    case "*":
                        $result = $op1 * $op2;
                        break;
                    case "/":
                        $result = intval($op1 / $op2);
                        break;
                    default:
                        throw new Exception("Invalid operator: $token");
                }
                array_push($stack, $result);
            }
        }
        return $stack[0];
    }

}