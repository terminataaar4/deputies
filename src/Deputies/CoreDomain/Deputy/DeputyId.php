<?php

namespace Deputies\CoreDomain\Deputy;

class DeputyId
{
    private $value;

    public function __construct($value)
    {
        $this->value = (string) $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
