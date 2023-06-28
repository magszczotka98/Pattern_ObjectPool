<?php

spl_autoload_register(function ($classname) {
    include $classname . '.php';
});

$pool = new BurgerPool();

$Burger1 = $pool->getBurger();
$Burger2 = $pool->getBurger();

echo $Burger1->getName();

$pool->release($Burger1);

$Burger3 = $pool->getBurger();

echo $Burger3->getName();