<?php

class Items extends Table {
    public $id = 0;
    public $name = '';
    public $education = 0;
    public $city = 0;
    public $born_date = null;
    public $summary = '';

    public function validate() {
        return (
            !empty($this->name) &&
            !empty($this->education) &&
            !empty($this->city) &&
            !empty($this->born_date) &&
            !empty($this->summary)
        );
    }
}