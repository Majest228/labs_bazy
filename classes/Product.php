<?php

class Product extends Table {
    public $id = 0;
    public $name = '';
    public $manufactured = '';
    public $category = '';
    public $price = '';

    public function validate() {
        return (
            !empty($this->name) &&
            !empty($this->manufactured) &&
            !empty($this->category) &&
            !empty($this->price)
        );
    }
}