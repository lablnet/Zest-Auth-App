<?php

namespace Config;

/**
 * Database configuration.
 */
class Database
{
    /* Database DRIVE */
    /**
     * Database driver.
     *
     * @var string
     */
    const DB_DRIVER = 'mysql'; // mysql is recommendeds
    /* Start MYSQL configuration */
    /**
     * MySql host.
     *
     * @var string
     */
    const MYSQL_HOST = 'localhost';

    /**
     * Database name.
     *
     * @var string
     */
    const MYSQL_NAME = 'auth';

    /**
     * Database user.
     *
     * @var string
     */
    const MYSQL_USER = 'root';

    /**
     * Database password.
     *
     * @var string
     */
    const MYSQL_PASS = '';

    /* End MYSQL configuration */
}
