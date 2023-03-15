class NestedIterator 
{
        private $buf, $curr;
        
        private function flatten(NestedInteger &$curr)
        {
                if($curr->isInteger())
                        $this->buf[] = $curr->getInteger();
                else
                {
                        $list = $curr->getList();
                        foreach($list as $ni)
                                $this->flatten($ni);
                }
        }
        
        /**
        * @param NestedInteger[] $nestedList
        */
        function __construct($nestedList) 
        {
                $this->buf = [];
                foreach($nestedList as $ni)
                        $this->flatten($ni);
                $this->curr = 0;
        }
        
        /**
        * @return Integer
        */
        function next() 
        {
                return $this->buf[$this->curr++];
        }

        /**
        * @return Boolean
        */
        function hasNext() 
        {
                return $this->curr < count($this->buf);
        }
}

/**
 * Your NestedIterator object will be instantiated and called as such:
 * $obj = NestedIterator($nestedList);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */
