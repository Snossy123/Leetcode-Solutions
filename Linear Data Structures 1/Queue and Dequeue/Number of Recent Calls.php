class RecentCounter { 
    public $que=[];
    /**
     */ 
    function __construct() {}
  
    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t) { 
        $this->que[] = $t;
        $min = $t-3000;
        while($this->que[0] < $min){array_shift($this->que);}
        return count($this->que);
    }
} 