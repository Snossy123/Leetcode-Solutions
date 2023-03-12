class MyCircularQueue {
    public $max;
    public $q=[];
    /**
     * @param Integer $k
     */
    function __construct($k) {
        $this->max = $k;
    }
  
    /**
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) { 
        if(count($this->q)==$this->max){return false;}
        $this->q[] = $value;
        return true;
    }
  
    /**
     * @return Boolean
     */
    function deQueue() {
        var_dump($this->q);
        if(!count($this->q)){return false;}
        array_shift($this->q);
        return true;
    }
  
    /**
     * @return Integer
     */
    function Front() {
        if(!count($this->q)){return -1;}
        return $this->q[0];
    }
  
    /**
     * @return Integer
     */
    function Rear() {
        if(!count($this->q)){return -1;}
        return end($this->q);
    }
  
    /**
     * @return Boolean
     */
    function isEmpty() {
        return empty($this->q)??false;
    }
  
    /**
     * @return Boolean
     */
    function isFull() {
        return count($this->q)==$this->max??false;
    }
} 