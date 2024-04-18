<?php

declare(strict_types=1);

namespace MyProject\Controllers;

use MyProject\Services\FileService;
use MyProject\Services\UserService;
use MyProject\View\View;

class ActiveController
{
    /** @var View */
    private $view;
    private $userService;
    private $fileService;


    public function __construct()
    {
        $this->userService = new UserService();
        $this->fileService = new FileService();
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $users = $this->userService->active();
        $this->view->renderHtml("users/active.php", ['users' => $users]);
    }

    /**
     * @return void
     */
    public function getCsvActiveUser(): void
    {
        $users = $this->userService->active();
        if (!empty(count($users))) {
            $this->fileService->getCsvActiveUser($users);
        }

        header('Location: /');
    }

}