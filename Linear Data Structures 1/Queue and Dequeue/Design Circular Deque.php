class MyCircularDeque {
    public $maxSz;
    public $que=[];
    /**
     * @param Integer $k
     */
    function __construct($k) {
        $this->maxSz = $k;
    }
  
    /**
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if(count($this->que)>=$this->maxSz){return false;}
        array_unshift($this->que, $value);
        return true;
    }
  
    /**
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) { 
        if(count($this->que)>=$this->maxSz){return false;}
        array_push($this->que, $value);
        return true;
    }
  
    /**
     * @return Boolean
     */
    function deleteFront() {
        if(empty($this->que)){return false;}
        array_shift($this->que);
        return true;
    }
  
    /**
     * @return Boolean
     */
    function deleteLast() {
        if(empty($this->que)){return false;}
        array_pop($this->que);
        return true;
    }
  
    /**
     * @return Integer
     */
    function getFront() {
        if(empty($this->que)){return -1;} 
        return $this->que[0];
    }
  
    /**
     * @return Integer
     */
    function getRear() {
        if(empty($this->que)){return -1;} 
        return end($this->que);
    }
  
    /**
     * @return Boolean
     */
    function isEmpty() {
        return empty($this->que)??false;
    }
  
    /**
     * @return Boolean
     */
    function isFull() {
        return count($this->que)==$this->maxSz??false;
    }
}
 