<?php

namespace Samin\Data;

use Samin\Data\Node;

class HashMap{

    private $hashTable;
    public function __construct(private $size = 10)
    {
        $this->hashTable = array_fill(0, $this->size, NULL);
    }

    /**
     * Hash function
     */
    protected function hashCode($key)
    {
        return $key % $this->size;
    }

    public function get($key)
    {
        $hashIdx = $this->hashCode($key);

        while($this->hashTable[$hashIdx] != NULL){

            if($this->hashTable[$hashIdx]->key == $key)
                return $this->hashTable[$hashIdx]->value;
            
            $hashIdx++;

            $hashIdx % $this->size;

        }

        return NULL;
    }

    public function add($key, $value)
    {
        $hashIdx = $this->hashCode($key);

        while($this->hashTable[$hashIdx] != NULL){
            $hashIdx++;
            $hashIdx %= $this->size;
            if($this->hashTable[$hashIdx] == NULL){
                $this->hashTable[$hashIdx]->key = $key;
                $this->hashTable[$hashIdx]->value = $value;
            }
        }

        $this->hashTable[$hashIdx] = new Node($key, $value);
    }

    public function sizeof()
    {
        return $this->size;
    }
}