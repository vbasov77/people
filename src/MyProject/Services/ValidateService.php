<?php

namespace MyProject\Services;

use MyProject\Rules\CreateUserRules;
use MyProject\Rules\EditUserRules;
use Valitron\Validator;

class ValidateService extends Service
{
    private $createUserRules;
    private $editUserRules;

    public function __construct()
    {
        $this->createUserRules = new CreateUserRules();
        $this->editUserRules = new EditUserRules();
    }

    /**
     * @return array|void
     */
    public function validateCreateUser()
    {
        $rules = $this->createUserRules->rules();
        $v = new Validator($_POST);
        $v->rules($rules);

        if (!$v->validate()) {

            $errors = '<ul>';
            foreach ($v->errors() as $error) {
                foreach ($error as $item){
                    $errors .= "<li>{$item}</li>";
                }
            }
            $errors .= '<ul>';
            $_SESSION['errors'] = $errors;

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'fio' => $_POST['fio'],
                'login' => $_POST['login'],
                'password' => md5($_POST['password']),
                'birth' => $_POST['birth'],
                'active' => $_POST['active']
            ];

            return $this->clearData($data);
        }
    }

    /**
     * @return array|void
     */
    public function validateEditUser()
    {
        $rules = $this->editUserRules->rules();
        $v = new Validator($_POST);
        $v->rules($rules);

        if (!$v->validate()) {
            $errors = '<ul>';
            foreach ($v->errors() as $error) {
                foreach ($error as $item){
                    $errors .= "<li>{$item}</li>";
                }
            }
            $errors .= '<ul>';
            $_SESSION['errors'] = $errors;

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $data = [
                'id' => (int)$_POST['id'],
                'fio' => $_POST['fio'],
                'login' => $_POST['login'],
                'password' => md5($_POST['password']),
                'birth' => $_POST['birth'],
                'active' => $_POST['active']
            ];

            return $this->clearData($data);
        }
    }

    /**
     * @param array $array
     * @return array
     */
    public function clearData(array $array): array
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            $value = trim($value);
            $value = stripcslashes($value);
            $value = strip_tags($value);
            $newArray[$key] = htmlspecialchars($value);
        }

        return $newArray;
    }
}