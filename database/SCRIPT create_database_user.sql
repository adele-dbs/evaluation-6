CREATE USER 'kgbuser'@'localhost' 
IDENTIFIED BY PASSWORD '2hvhDhnDSO-[PS6Q';
GRANT USAGE ON *.* TO 'kgbuser'@'localhost' 
REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `kgb`.* TO 'kgbuser'@'localhost';

CREATE USER 'kgbuser'@'localhost';
GRANT USAGE ON *.* TO 'kgbuser'@'localhost' 
REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `kgb`.* TO 'kgbuser'@'localhost';