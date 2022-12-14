<?php

declare(strict_types=1);

namespace App\Model\Db;

use mysqli;

class Connection
{
    /**
     * @var mysqli|null
     */
    static private ?mysqli $connection = null;

    /**
     * Singleton Pattern
     */
    private function __construct()
    {
    }

    /**
     * Establish database connection
     *
     * @return mysqli
     */
    static public function getConnection(): mysqli
    {
        if (self::$connection === null) {
            try {
                $connection = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
            } catch (\Throwable $e) {
                echo $e->getMessage();
                $connection = false;
            }

            self::$connection = $connection;
        }

        return self::$connection;
    }

    /**
     * @return void
     */
    static public function closeConnection(): void
    {
        self::$connection->close();
        self::$connection = null;
    }
}