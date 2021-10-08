<?php

namespace Aurora;

use Rakit\Validation\Validator as Val;
use Rakit\Validation\Validation;

class Validator {
    protected $validator;

    function __construct() {
        $this->validator = new Val([
            'required' => 'Pole :attribute jest wymagane',
            'email' => 'Pole :attribute musi być poprawnym adresem mailowym',
            'numeric' => "Pole :attribute musi być liczbą",
            'min' => "Pole :attribute musi mieć wartość/długość minumum :min",
            'max' => "Pole :attribute musi mieć wartość/długość maksimum :max",
        ]);
    }

    public function validate(array $aliases, array $fields, array $options): Validation {
        
        $validation = $this->validator->make($fields, $options);

        $validation->setAliases($aliases);
        
        $validation->validate();

        return $validation;
    }
}