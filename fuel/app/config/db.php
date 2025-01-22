<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

 return array(
    'default' => array(
        'type'        => 'mysql', // Database type
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=kintore-db', // Use the database service name ('db') as the host
            'username'   => 'root',                           // MySQL root username
            'password'   => 'root',                           // MySQL root password
            'persistent' => false,                           // Disable persistent connections
        ),
        'table_prefix' => '',     // Optional: Add a table prefix if needed
        'charset'      => 'utf8', // Use UTF-8 for character encoding
    ),
);
;