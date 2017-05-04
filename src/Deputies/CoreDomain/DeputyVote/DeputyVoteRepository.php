<?php

namespace Deputies\CoreDomain\DeputyVote;

interface DeputyVoteRepository
{
    public function find(DeputyVoteId $deputyId);

    public function findAll();

    public function add(DeputyVote $deputy);

    public function remove(DeputyVote $deputy);
}
