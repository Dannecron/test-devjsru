<?php
namespace Dogs\Kinds;

use Dogs\Prey;
use Illuminate\Support\Collection;

class RubberDachshund extends \Dogs\DogAbstract
{
    /**
     * @inheritDoc
     */
    public function getKind() : string
    {
        return static::KIND_RUBBER_DACHSHUND;
    }

    /**
     * @inheritDoc
     */
    public function makeHunt() : Prey
    {
        throw new \Dogs\Exceptions\InabilityToDoAction('This is just a toy.');
    }

    /**
     * @inheritDoc
     */
    public function makeSound() : string
    {
        return '"quack! quack!"';
    }
}
