<?php

declare(strict_types=1);

namespace MyProject\Repositories;

use \MyProject\Services\Db;

class UserRepository extends Repository
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    /**
     * @return array|null
     */
    public function findAll(): ?array
    {
        return $this->db->query("select * from users");
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findById(int $id): ?array
    {
        return $this->db->query("select * from users where id = :id", ['id' => $id]);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findFioById(int $id): ?array
    {
        return $this->db->query("select fio from users where id = :id", ['id' => $id]);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findLoginById(int $id): ?array
    {
        return $this->db->query("select login from users where id = :id", ['id' => $id]);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findBirthById(int $id): ?array
    {
        return $this->db->query("select birth from users where id = :id", ['id' => $id]);
    }

    /**
     * @param int $id
     * @param array $array
     * @return void
     */
    public function update(int $id, array $array): void
    {
        $this->db->query("update users set fio = :fio, login = :login, password = :password, 
                 birth = :birth, active = :active  where id = :id", ['id' => $id, 'fio' => $array['fio'],
            'login' => $array['login'], 'password' => $array['password'], 'birth' => $array['birth'],
            'active' => $array['active'],
        ]);
    }

    /**
     * @param array $array
     * @return void
     */
    public function create(array $array): void
    {
        $this->db->query("insert into users (fio, login, password, birth, active) VALUES (:fio, :login, :password, :birth, :active)", ['fio' => $array['fio'],
            'login' => $array['login'], 'password' => $array['password'], 'birth' => $array['birth'],
            'active' => $array['active']
        ]);
    }

    /**
     * @return array
     */
    public function active(): array
    {
        return $this->db->query("select * from users where active = 1");
    }

}