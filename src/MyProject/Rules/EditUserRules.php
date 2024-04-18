<?php

namespace MyProject\Rules;

class EditUserRules
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'required' => ['fio', 'login', 'password', 'birth', 'active'],
            'lengthMin' => ['password', 3],
            'regex' => [
                ['login', '/^[a-zA-Z]{5,10}$/']
                ],
            'integer' => [
                ['id', 'active']
            ],
        ];
    }
}