<?php 

namespace RTNatePHP\Util\Traits;

trait HasMemberArrayIterator
{
    protected $iterator = [];

    public function current()
    {
        return current($this->iterator);
    }

    public function key()
    {
        return key($this->iterator);
    }

    public function next()
    {
        return next($this->iterator);
    }

    public function rewind()
    {
        return reset($this->iterator);
    }

    public function valid()
    {
        return (key($this->iterator) !== null);
    }

}