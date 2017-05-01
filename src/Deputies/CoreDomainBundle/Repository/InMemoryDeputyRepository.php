<?php

namespace Deputies\CoreDomainBundle\Repository;

use Deputies\CoreDomain\Deputy\Deputy;
use Deputies\CoreDomain\Deputy\DeputyId;
use Deputies\CoreDomain\Deputy\DeputyRepository;

class InMemoryDeputyRepository implements DeputyRepository
{
    private $deputies;

    public function __construct()
    {
        $this->deputies[] = new Deputy(
            new DeputyId('62A0CEB4-0403-4AA6-A6CD-1EE808AD4D23'), 'Ivanov Ivan Ivanovich'
        );
        $this->deputies[] = new Deputy(
            new DeputyId('8CE05088-ED1F-43E9-A415-3B3792655A9B'), 'Semenov Semen Semonovich'
        );
    }

    public function find(DeputyId $deputyId)
    {
    }

    public function findAll()
    {
        return $this->deputies;
    }

    public function add(Deputy $deputy)
    {
        if (!in_array($deputy, $this->deputies)) {
            $this->deputies[] = $deputy;
        }
    }

    public function remove(Deputy $deputy)
    {
        if (in_array($deputy)) {
            $this->deputies = array_splice($this->deputies, $this->deputies[array_search($deputy, $this->deputies)], 1);
        }
    }
}
