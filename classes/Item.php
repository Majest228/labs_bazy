<?php

class Item extends Table {
    public $id = 0;
    public $name = '';
    public $price = 0;

    public function validate() {
        return (
            !empty($this->name) &&
            !empty($this->price)
        );
    }
}