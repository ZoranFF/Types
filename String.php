<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 01.12.15
 * Time: 16:35
 */
class String extends Type
{
    protected function getTypeSpecific($val)
    {
        return strval($val);
    }

    public function cln()
    {
        return clone $this;
    }
}