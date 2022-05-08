<?php

function getEntityManager ()
{
    if (getenv('JAWSDB_URL') !== false) {
        $dbparts = parse_url(getenv('JAWSDB_URL'));
        $dbParams = [
          'driver' => $dbparts['host'],
          'user' => $dbparts['user'],
          'password' => $dbparts['pass'],
          'dbname' => ltrim($dbparts['path'],'/'),
        ];
    } else {
        $dbParams = [
          'driver' => 'pdo_mysql',
          'user' => 'root',
          'password' => '',
          'dbname' => 'kgb',
        ];
    }  
}
