<?php

namespace Deputies\CoreDomain\RollCallVoting;

use Deputies\CoreDomain\Session\Session;

class RollCallVoting 
{
    private $id;

    private $session;

    private $number;

    private $phase;

    private $subject;

    public function __construct(RollCallVotingId $id, Session $session, $number, $phase, $subject = "")
    {
        $this->id = $id;
        $this->session = $session;
        $this->number = $number;
        $this->phase = $phase;
        $this->subject = $subject;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getPhase()
    {
        return $this->phase;
    }

    public function getSubject()
    {
        return $this->subject;
    }
}
