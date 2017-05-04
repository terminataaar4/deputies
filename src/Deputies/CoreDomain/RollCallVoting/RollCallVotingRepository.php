<?php

namespace Deputies\CoreDomain\RollCallVoting;

interface RollCallVotingRepository
{
    public function find(RollCallVotingId $rollCallVotingId);

    public function findAll();

    public function add(RollCallVoting $rollCallVoting);

    public function remove(RollCallVoting $rollCallVoting);
}
