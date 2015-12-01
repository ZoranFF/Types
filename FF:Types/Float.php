<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 01.12.15
 * Time: 16:36
 */
namespace FF\Types;

class Float extends Type
{
    protected function getTypeSpecific($val)
    {
        return floatval($val);
    }

    public function cln()
    {
        return clone $this;
    }
}