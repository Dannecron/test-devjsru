<?php
namespace Dogs\Kinds;

use Dogs\Prey;

class Pug extends \Dogs\DogAbstract
{
    /**
     * @inheritDoc
     */
    public function getKind() : string
    {
        return static::KIND_PUG;
    }

    /**
     * @inheritDoc
     */
    public function makeHunt() : Prey
    {
        throw new \Dogs\Exceptions\InabilityToDoAction('Pug is too lazy to do that.');
    }

    /**
     * @inheritDoc
     */
    public function makeSound() : string
    {
        return '"arghp! arghp!"';
    }
}
