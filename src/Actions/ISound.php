<?php
namespace Dogs\Actions;

interface ISound
{
    /**
     * Make a sound and return it's string representation
     *
     * @return string
     */
    public function makeSound() : string;
}
