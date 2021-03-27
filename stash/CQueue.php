<?php
// 剑指 Offer 09. 用两个栈实现队列
class CQueue {
    private $stashIn = [];
    private $stashOut = [];
    private $size = 0;

    /**
     */
    function __construct() {

    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value) {
        $this->stashIn[] = $value;
        $this->size++;
    }

    /**
     * @return Integer
     */
    function deleteHead() {
        if (empty($this->size)) {
            return -1;
        }

        if (empty($this->stashOut)) {
            while($this->stashIn) {
                $this->stashOut[] = array_pop($this->stashIn); 
            }
        }

        $this->size--;
        return array_pop($this->stashOut);
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */

class CQueueSpl {
    private $stashIn;
    private $stashOut;
    private $size;

    /**
     */
    function __construct() {
        $this->stashIn = new SplStack();
        $this->stashOut = new SplStack();
        $this->size = 0;
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value) {
        $this->stashIn->push($value);
        $this->size++;
    }

    /**
     * @return Integer
     */
    function deleteHead() {
        if (empty($this->size)) {
            return -1;
        }

        if ($this->stashOut->isEmpty()) {
            while(!$this->stashIn->isEmpty()) {
                $this->stashOut->push($this->stashIn->pop()); 
            }
        }

        $this->size--;
        return $this->stashOut->pop();
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */