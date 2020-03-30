<?php

namespace RTNatePHP\Util\Traits;

trait GettableAndSettable
{
    use \RTNatePHP\Util\Traits\ArrayAccessUsesGetAndSet;

    public function __get($key)
    {
        return $this->get($key);
    }

    public function __set($key, $value)
    {
        $this->set($key, $value);
    }

}