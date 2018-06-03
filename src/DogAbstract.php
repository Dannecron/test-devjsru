<?php
namespace Dogs;

use Dogs\Actions\IHunt;
use Dogs\Actions\ISound;

/**
 * @method Prey hunt()
 * @method string sound()
 */
abstract class DogAbstract implements IHunt, ISound
{
    public const KIND_PLUSH_LABRADOR = 'plush-labrador';
    public const KIND_PUG = 'pug';
    public const KIND_RUBBER_DACHSHUND = 'rubber-dachshund';
    public const KIND_SHIBA_INU = 'shiba-inu';

    /**
     * @return string
     */
    abstract public function getKind() : string;

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \Dogs\Exceptions\UnknownActionException
     */
    public function __call(string $name, array $arguments)
    {
        $action = "make" . studly_case($name);
        if (method_exists($this, $action)) {
            return $this->$action();
        }

        throw new \Dogs\Exceptions\UnknownActionException($name);
    }

    /**
     * Make an instance of dog
     *
     * @param string $kind
     * @return self
     * @throws \Dogs\Exceptions\UnknownKindException
     */
    public static function buildDog(string $kind) : self
    {
        if (static::isDog($kind)) {
            $kindClass = '\\Dogs\\Kinds\\' . studly_case($kind);
            return new $kindClass();
        }

        throw new \Dogs\Exceptions\UnknownKindException($kind);
    }

    /**
     * Is specified kind is a dog
     *
     * @param string $kind
     * @return boolean
     */
    public static function isDog(string $kind) : bool
    {
        $kindClass = studly_case($kind);
        return class_exists("\\Dogs\\Kinds\\{$kindClass}");
    }

    /**
     * @return array|string[]
     */
    public static function getKnownKinds() : array
    {
        return [
            static::KIND_PLUSH_LABRADOR,
            static::KIND_PUG,
            static::KIND_RUBBER_DACHSHUND,
            static::KIND_SHIBA_INU
        ];
    }

    public static function getKnownActions() : array
    {
        $allMethods = get_class_methods(static::class);
        $actionMethods = array_filter($allMethods, function (string $methodName) {
            return strpos($methodName, 'make') === 0;
        });

        return array_map(function (string $methodName) {
            $action = str_replace('make', '', $methodName);
            return kebab_case($action);
        }, $actionMethods);
    }
}
