<?php

namespace App;

class Identity
{
    protected int $identity;

    public function setIdentity(int $identity)
    {
        $this->identity = $identity;

        return $this;
    }


    public function whoAreYou()
    {
        return $this->identity;
    }
}