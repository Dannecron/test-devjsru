<?php
namespace Dogs\Kinds;

use Dogs\Prey;
use Illuminate\Support\Collection;

class PlushLabrador extends \Dogs\DogAbstract
{
    /**
     * @inheritDoc
     */
    public function getKind() : string
    {
        return static::KIND_PLUSH_LABRADOR;
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
        throw new \Dogs\Exceptions\InabilityToDoAction('That toy does not make sound');
    }
}
