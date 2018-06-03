<?php
namespace Dogs\Kinds;

use Dogs\Prey;
use Illuminate\Support\Collection;

class ShibaInu extends \Dogs\DogAbstract
{
    /**
     * @inheritDoc
     */
    public function getKind() : string
    {
        return static::KIND_SHIBA_INU;
    }

    /**
     * @inheritDoc
     */
    public function makeHunt() : Prey
    {
        $preys = new Collection([
            new \Dogs\Prey('duck'),
            new \Dogs\Prey('twig'),
            new \Dogs\Prey('cat')
        ]);
        return $preys->random();
    }

    /**
     * @inheritDoc
     */
    public function makeSound() : string
    {
        return '"woof! woof!"';
    }
}
