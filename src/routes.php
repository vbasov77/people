<?php

use \MyProject\Controllers\UserController;
use \MyProject\Controllers\ActiveController;

return [
    '~^fio/(\d+)$~' => [UserController::class, 'findFioById'],
    '~^login/(\d+)$~' => [UserController::class, 'findLoginById'],
    '~^birth/(\d+)$~' => [UserController::class, 'findBirthById'],
    '~^user/edit$~' => [UserController::class, 'update'],
    '~^user/create$~' => [UserController::class, 'create'],
    '~^user/store~' => [UserController::class, 'store'],
    '~^update/(\d+)$~' => [UserController::class, 'edit'],
    '~^active$~' => [ActiveController::class, 'index'],
    '~^csv~' => [ActiveController::class, 'getCsvActiveUser'],
    '~^$~' => [UserController::class, 'index'],
];
