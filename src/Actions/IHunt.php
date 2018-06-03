<?php
namespace Dogs\Actions;

use Dogs\Prey;

interface IHunt
{
    /**
     * Go to hunt and get a prey
     *
     * @return \Dogs\Prey
     */
    public function makeHunt() : Prey;
}
