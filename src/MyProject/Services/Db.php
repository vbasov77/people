<?php

declare(strict_types=1);

namespace MyProject\Services;

use MyProject\Exceptions\DbException;

class Db
{

    private static $instance; //добавили переменную для паттерна Синглтон.
    /** @var \PDO */
    private $pdo;

    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

        try {
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
        } catch (\PDOException $e) {
            throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }
    }

    /**
     * @param string $sql
     * @param $params
     * @param string $className
     * @return array|null
     */
    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    { //$className = 'stdClass' -
        // указали класс, объекты которого нужно создать.

        $sth = $this->pdo->prepare($sql); // Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
        $result = $sth->execute($params);// Запускает подготовленный запрос на выполнение

        if (false === $result) {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    /**
     * @return static
     */
    public static function getInstance(): self //метод для паттерна Синглтон. Теперь мы можем создавать объекты класса Db с помощью этого метода - $db = Db::getInstance();
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;

    }


}