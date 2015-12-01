<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 01.12.15
 * Time: 16:31
 */

namespace FF\Types;

abstract class Type
{
    protected $val;
    function __construct ($val = '')
    {
        $this->set($val);
    }

    public function set ($val)
    {
        switch(true)
        {
            case is_object($val) && (get_class($val) != get_class($this)) && !$val instanceof Type:
                throw new \Exception("Could not convert to string. Object of Class: " . get_class($val) . "");
                break;

            case is_array($val):
                throw new \Exception("Cannot convert an array to a Type value.");
                break;

            case get_class($val) == get_class($this):
                $val_tmp = $val->get();
                break;

            case $val instanceof Type:
                $val_tmp = $this->getTypeSpecific($val->get());
                break;

            default:
                $val_tmp = $this->getTypeSpecific($val);
                break;
        }

        $this->val = $val_tmp;
        return $this;
    }

    protected abstract function getTypeSpecific($val);

    public function get ()
    {
        return $this->val;
    }

    /**
     * IMPORTANT: Always call this function, when u want to create a new variable from this Object
     * Returns a clone
     * @example Classic Way for Strings: $text = "asdaa". Simulate it like this: $text = $stringObject->cln();
     */
    public abstract function cln ();

    /**
     * IMPORTANT: Always call this function, when passing this as a Parameter.
     * Simulates the Not-Referenced-Behavior
     * Creates an new Instance with the same Values
     * @example $someObject->performSomething($typeObject->par());
     */
    public function par ()
    {
        return $this->cln();
    }
}