class Solution {
    private $dp = [];
    function tribo($n){
        if($n == 2 || $n == 1) return 1;
        if($n == 0) return 0; 
        if(!$this->dp[$n-1]){$this->dp[$n-1]=$this->tribo($n-1);}
        if(!$this->dp[$n-2]){$this->dp[$n-2]=$this->tribo($n-2);}
        if(!$this->dp[$n-3]){$this->dp[$n-3]=$this->tribo($n-3);} 
        return  $this->dp[$n-1] + $this->dp[$n-2] + $this->dp[$n-3];
    }
    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n) {
        $this->dp = array_fill(0, $n, 0);
        return $this->tribo($n);
    }
}