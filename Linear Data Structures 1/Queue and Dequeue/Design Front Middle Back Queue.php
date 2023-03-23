/**
    * Approach
    * we are using two deque dq1 & dq2, dq1 hold element till mid element and
    * dq2 hold elements form mid+1 to till last element.
    * if in our data structure had odd size, then dq1 has 1 element more than dq2.
    * we have to maintain mid element by both deques.
*/
class FrontMiddleBackQueue {
    private $dq1 = [];
    private $dq2 = [];
    
    function __construct() {
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function pushFront($val) {
        array_unshift($this->dq1, $val);
        $this->balance();
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function pushMiddle($val) { 
      if(count($this->dq1) - count($this->dq2) == 1)
        {   
          $lastMid = end($this->dq1);
          array_pop($this->dq1);
          array_unshift($this->dq2, $lastMid); 
        }
      array_push($this->dq1, $val);
      $this->balance();
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function pushBack($val) {
        array_push($this->dq2, $val);
        $this->balance();
    }

    /**
     * @return Integer
     */
    function popFront() {
      if(empty($this->dq1))
        return -1;
      $popedVal = $this->dq1[0];
      array_shift($this->dq1);
      $this->balance();
      return $popedVal;
    }
    
    /**
     * @return Integer
     */
    function popMiddle() {  
      if(empty($this->dq1))return -1; 
      $popedVal = end($this->dq1);
      array_pop($this->dq1);  
      $this->balance();
      return $popedVal;
    }
  
    /**
     * @return Integer
     */
    function popBack() {
      if(empty($this->dq2)){
        if(empty($this->dq1))
          return -1;
        else{
          $popedVal = end($this->dq1);
          array_pop($this->dq1);
          $this->balance();
          return $popedVal;
        }
      }
      $popedVal = end($this->dq2);
      array_pop($this->dq2);
      $this->balance();
      return $popedVal;
    }

    function balance(){          

      // we have to try  equal elements in both deque
      $diff = count($this->dq1) - count($this->dq2); 
      
      if($diff == 0 || $diff == 1) 
        {       
          return;
        }
      else if($diff < 0){
        $incVal = $this->dq2[0];
        array_shift($this->dq2);
        array_push($this->dq1, $incVal);
      }else{
        $incVal = end($this->dq1);
        array_pop($this->dq1);
        array_unshift($this->dq2, $incVal);
      }
    }
}

/**
 * Your FrontMiddleBackQueue object will be instantiated and called as such:
 * $obj = FrontMiddleBackQueue();
 * $obj->pushFront($val);
 * $obj->pushMiddle($val);
 * $obj->pushBack($val);
 * $ret_4 = $obj->popFront();
 * $ret_5 = $obj->popMiddle();
 * $ret_6 = $obj->popBack();
 */