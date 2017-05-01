<?php

namespace Deputies\CoreDomain\Deputy;

class Deputy 
{
    private $id;

    private $fullname;

    public function __construct(DeputyId $id, $fullname)
    {
        $this->id = $id;
        $this->fullname = $fullname;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }
}
