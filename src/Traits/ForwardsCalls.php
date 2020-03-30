<?php

namespace RTNatePHP\Util\Traits;

trait ForwardsCalls
{
    protected function getForwardObject()
    {
        return null;
    }

    /**
     * Forwards any function calls to to the forward class
     */
    public function __call($name, $arguments)
    {
        $forwardObject = $this->getForwardObject(); 
        if ($forwardObject && method_exists($forwardObject, $name))
        {
            return call_user_func_array(array($forwardObject, $name), $arguments);
        }
        else{
            throw new \RuntimeException("Method {$name} does not exist on class {static::class}");
        }
    }


}