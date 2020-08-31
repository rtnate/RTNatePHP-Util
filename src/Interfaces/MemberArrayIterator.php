<?php 

namespace RTNatePHP\Util\Interfaces;

abstract class MemberArrayIterator implements \Iterator 
{
    abstract protected function getIteratorArray(): array;
}