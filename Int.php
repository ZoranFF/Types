<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 01.12.15
 * Time: 16:36
 */

class Int extends Type
{
    protected function getTypeSpecific($val)
    {
        return intval($val);
    }

    public function add ($val)
    {
        $add = new Int($val);
        $this->val += $add->get();
        return $this;
    }

    public function cln ()
    {
        return clone $this;
    }
}