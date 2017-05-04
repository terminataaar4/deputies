<?php

namespace Deputies\CoreDomain\Session;

class Session 
{
    private $council;

    private $date;

    private $number;

    private $name;

    public function __construct($council, $date, $number, $name)
    {
        $this->council = $council;
        $this->date = $date;
        $this->number = $number;
        $this->name = $name;
    }

    public function getCouncil()
    {
        return $this->council;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function equals($object)
    {
        return get_class($object) === get_class($this)
            && $this->council === $object->council
            && $this->date === $object->date
            && $this->number === $object->number
            && $this->name === $object->name;
    }
}
