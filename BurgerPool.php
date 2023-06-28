<?php

class BurgerPool
{
    private $purchasedBurgers = [];
    private $freeBurgers = [];
    private $names = [ ' Clasic Burger', ' BLT Burger', ' Chicken Burger', ' Pork Burger', ' BBQ Burger', ' Fish Burger', ' Devil Burger'];

    public function getBurger()
    {
        if (count($this->freeBurgers) == 0) {
            $id = count($this->purchasedBurgers) + count($this->freeBurgers) +1;
            $randomName = array_rand($this->names, 1);

            $Burger = new NumberBurger($id, $this->names[$randomName]);
        } else
            $Burger = array_pop($this->freeBurgers);

        $this->purchasedBurgers[$Burger->getId()] = $Burger;

        return $Burger;
    }

    public function release(NumberBurger $Burger)
    {
        $id = $Burger->getId();

        if(isset($this->purchasedBurgers[$id])) {
            unset($this->purchasedBurgers[$id]);
        }
    }
}