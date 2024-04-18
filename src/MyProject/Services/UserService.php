<?php

declare(strict_types=1);

namespace MyProject\Services;

use MyProject\Repositories\UserRepository;

class UserService extends Service
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->userRepository->findAll();
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findFioById(int $id): ?array
    {
        return $this->userRepository->findFioById($id);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findLoginById(int $id): ?array
    {
        return $this->userRepository->findLoginById($id);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findBirthById(int $id): ?array
    {
        return $this->userRepository->findBirthById($id);
    }

    /**
     * @param int $id
     * @param $array
     * @return void
     */
    public function update(int $id, $array): void
    {
        $this->userRepository->update($id, $array);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findById(int $id): ?array
    {
       return $this->userRepository->findById($id);
    }

    /**
     * @param array $array
     * @return void
     */
    public function create(array $array): void
    {
        $this->userRepository->create($array);
    }

    /**
     * @return array
     */
    public function active(): array
    {
        return $this->userRepository->active();
    }
}