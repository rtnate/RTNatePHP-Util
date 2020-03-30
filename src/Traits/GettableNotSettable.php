<?php

namespace RTNatePHP\Util\Traits;

trait GettableNotSettable
{
    use \RTNatePHP\Util\Traits\ArrayAccessUsesGetAndSet;

    public function __get($key)
    {
        return $this->get($key);
    }

    public function set($key, $value)
    {        
        throw new \Exception("Unable to set values using ".static::class);
    }

}