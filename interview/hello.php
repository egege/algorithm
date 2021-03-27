<?php

final class Instance {
    private $instance = null;

    public function getInstance() {
        if (is_null($this->instance)) {
            $this->instance = new static();
        }

        return $this->instance;
    }

    /**
     * 需要私有化构造器
     */
    private function __construct() {
        // construct
    }

    private function __clone() {
        
    }

    private function __wakeup() {

    }
}