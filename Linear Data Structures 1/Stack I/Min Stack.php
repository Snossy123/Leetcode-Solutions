class MinStack {
    private $stack=array();
    private $min=array();
    /**
     */
    function __construct() { 
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) { 
        $this->stack[] = $val; 
        if(empty($this->min) || $val <= end($this->min)){
            array_push($this->min, $val);
        }
    }
  
    /**
     * @return NULL
     */ 
    function pop() {
        if(end($this->stack) === end($this->min)){
            array_pop($this->min);
        }
        array_pop($this->stack); 
    }
  
    /**
     * @return Integer
     */
    function top() {
        return  end($this->stack);
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return end($this->min);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */