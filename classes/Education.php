<?php

class Education extends Table {
    public $id = 0;
    public $education_type = 0;
    public $place = '';

    public function validate() {
        return (!empty($this->education_type) && !empty($this->place));
    }
}
