<?php

namespace Deputies\CoreDomainBundle\Repository;

use Deputies\CoreDomain\Deputy\Deputy;
use Deputies\CoreDomain\Deputy\DeputyId;
use Deputies\CoreDomain\DeputyVote\DeputyVote;
use Deputies\CoreDomain\DeputyVote\DeputyVoteId;
use Deputies\CoreDomain\DeputyVote\DeputyVoteRepository;
use Deputies\CoreDomain\RollCallVoting\RollCallVoting;
use Deputies\CoreDomain\RollCallVoting\RollCallVotingId;
use Deputies\CoreDomain\Session\Session;

class InMemoryDeputyVoteRepository implements DeputyVoteRepository
{
    private $deputyVotes;

    public function __construct()
    {
        $session = new Session(
            "Council", date("d.m.Y"), 1, "Name of the session"
        );

        $rollCallVoting = new RollCallVoting(
            new RollCallVotingId('62A0CEB4-0403-4AA6-A6CD-1EE808AD4D24'), 
            $session,
            1,
            "Generally"
        );

        $deputy = new Deputy(
            new DeputyId('62A0CEB4-0403-4AA6-A6CD-1EE808AD4D23'), 'Ivanov Ivan Ivanovich'
        );

        $this->deputyVotes[] = new DeputyVote(
            new DeputyVoteId('62A0CEB4-0403-4AA6-A6CD-1EE808AD4D25'), $rollCallVoting, $deputy, "Yes"
        );
    }

    public function find(DeputyVoteId $deputyVoteId)
    {
    }

    public function findAll()
    {
        return $this->deputyVotes;
    }

    public function add(DeputyVote $deputyVote)
    {
    }

    public function remove(DeputyVote $deputyVote)
    {
    }
}
