<?php

namespace Deputies\CoreDomain\RollCallVoting;

class RollCallVotingId
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
