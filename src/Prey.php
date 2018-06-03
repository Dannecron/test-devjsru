<?php
namespace Dogs;

class Prey
{
    /** @var string $name */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return "Prey: {$this->getName()}";
    }
}
