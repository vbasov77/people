<?php

declare(strict_types=1);

namespace MyProject\Controllers;

use MyProject\Services\UserService;
use MyProject\Services\ValidateService;
use MyProject\View\View;


class UserController
{
    /** @var View */
    private $view;
    private $userService;
    private $validateService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->validateService = new ValidateService();
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $users = $this->userService->findAll();
        $this->view->renderHtml("users/index.php", ['users' => $users]);
    }

    /**
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        $user = $this->userService->findById($id);
        $this->view->renderHtml("users/edit.php", ['user' => $user[0]]);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $this->view->renderHtml("users/create.php");
    }

    /**
     * @param int $id
     * @return void
     */
    public function findFioById(int $id): void
    {
        var_dump($this->userService->findFioById($id));
    }

    /**
     * @param int $id
     * @return void
     */
    public function findLoginById(int $id): void
    {
        var_dump($this->userService->findLoginById($id));
    }

    /**
     * @param int $id
     * @return void
     */
    public function findBirthById(int $id): void
    {
        var_dump($this->userService->findBirthById($id));
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $array = $this->validateService->validateEditUser();
        try {
            $id = $array['id'];
            $this->userService->update((int)$id, $array);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die;
        } catch (\Exception $e) {
            echo "Ошибка!";
        }
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $array = $this->validateService->validateCreateUser();

        try {
            $this->userService->create($array);

            header('Location: /');
            die;
        } catch (\Exception $e) {
            echo "Ошибка";
        }
    }

}