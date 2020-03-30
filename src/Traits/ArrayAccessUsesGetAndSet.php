<?php

namespace RTNatePHP\Util\Traits;

trait ArrayAccessUsesGetAndSet
{
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }
    
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->set($offset, null);
    }
}