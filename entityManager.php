<?php

function getEntityManager ()
{
    if (getenv('JAWSDB_URL') !== false) {
      $url = getenv('JAWSDB_URL');
      $dbparts = parse_url($url);
      
      $hostname = $dbparts['host'];
      $username = $dbparts['user'];
      $password = $dbparts['pass'];
      $database = ltrim($dbparts['path'],'/');
      
    } else {
      $dbParams = [
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => '',
        'dbname' => 'kgb',
      ];
   }  
}
