<?php

namespace Deputies\CoreDomainBundle\Repository;

use Deputies\CoreDomain\RollCallVoting\RollCallVoting;
use Deputies\CoreDomain\RollCallVoting\RollCallVotingId;
use Deputies\CoreDomain\RollCallVoting\RollCallVotingRepository;
use Deputies\CoreDomain\Session\Session;

class InMemoryRollCallVotingRepository implements RollCallVotingRepository
{
    private $results;

    public function __construct()
    {
        $session = new Session(
            "Council", date("d.m.Y"), 1, "Name of the session"
        );

        $this->results[] = new RollCallVoting(
            new RollCallVotingId('62A0CEB4-0403-4AA6-A6CD-1EE808AD4D27'),
            $session,
            1,
            "Generally"
        );

        $this->results[] = new RollCallVoting(
            new RollCallVotingId('62A0CEB4-0403-4AA6-A6CD-1EE808AD4D28'),
            $session,
            2,
            "Generally"
        );
    }

    public function find(RollCallVotingId $rollCallVotingId)
    {
    }

    public function findAll()
    {
        return $this->results;
    }

    public function add(RollCallVoting $rollCallVoting)
    {
    }

    public function remove(RollCallVoting $rollCallVoting)
    {
    }
}
