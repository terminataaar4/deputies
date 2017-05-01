<?php

namespace Deputies\CoreDomain\Deputy;

interface DeputyRepository
{
    public function find(DeputyId $deputyId);

    public function findAll();

    public function add(Deputy $deputy);

    public function remove(Deputy $deputy);
}
