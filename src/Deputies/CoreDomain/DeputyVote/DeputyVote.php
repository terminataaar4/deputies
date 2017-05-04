<?php

namespace Deputies\CoreDomain\DeputyVote;

use Deputies\CoreDomain\Deputy\Deputy;
use Deputies\CoreDomain\RollCallVoting\RollCallVoting;

class DeputyVote 
{
    private $id;

    private $rollCallVoting;

    private $deputy;

    private $result;

    public function __construct(DeputyVoteId $id, RollCallVoting $rollCallVoting, Deputy $deputy, $result)
    {
        $this->id = $id;
        $this->rollCallVoting = $rollCallVoting;
        $this->deputy = $deputy;
        $this->result = $result;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRollCallVoting()
    {
        return $this->rollCallVoting;
    }

    public function getDeputy()
    {
        return $this->deputy;
    }

    public function getResult()
    {
        return $this->result;
    }
}
