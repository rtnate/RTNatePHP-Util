<?php

namespace RTNatePHP\Util\Traits;

trait GettableNotSettable
{
    use \RTNatePHP\Util\Traits\GettableAndSettable;
    
    public function set($key, $value)
    {        
        throw new \Exception("Unable to set values using ".static::class);
    }

}