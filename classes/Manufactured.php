<?php

class Manufactured extends Table {
    public $id = 0;
    public $name = '';

    public function validate() {
        return !empty($this->name);
    }
}