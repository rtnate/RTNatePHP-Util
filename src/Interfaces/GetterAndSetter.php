<?php

namespace RTNatePHP\Util\Interfaces;

use \ArrayAccess;

interface GetterAndSetter extends ArrayAccess
{
    //public function __get($key);
    //public function __set($key, $value);
    public function has($key);
    public function get($key, $default = null);
    public function set($key, $value);
}