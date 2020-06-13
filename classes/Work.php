<?php

class Work extends Table {
    public $id = 0;
    public $name = '';
    public $type = 0;
    public $create_date = null;

    public function validate() {
        return (
            !empty($this->name) &&
            !empty($this->type) &&
            !empty($this->create_date)
        );
    }
}