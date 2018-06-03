<?php

require_once './vendor/autoload.php';

$cmd = new Commando\Command();

$knownKinds = \Dogs\DogAbstract::getKnownKinds();
$knownActions = \Dogs\DogAbstract::getKnownActions();

$cmd->option()
    ->require()
    ->describedAs('Dog kind. Known values: ' . implode(', ', $knownKinds));

$cmd->option()
    ->require()
    ->describedAs('Action of dog. Known actions: ' . implode(', ', $knownActions));

$dogKind = $cmd[0];
$dogAction = $cmd[1];

try {
    echo "You choose {$dogKind}" . PHP_EOL;

    $dog = Dogs\DogAbstract::buildDog($dogKind);

    echo "Dog going to {$dogAction}" . PHP_EOL;

    $result = $dog->$dogAction();

    echo $result;
} catch (Dogs\Exceptions\ApplicationException $e) {
    echo $e->getMessage();
    return;
} catch (\Throwable $e) {
    echo 'Something going wrong.' . PHP_EOL;
    echo 'Message: ' . $e->getMessage();
    return;
}
