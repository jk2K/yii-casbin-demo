<?php

$mysqlHost = getenv('MYSQL_HOST');
$mysqlDbName = getenv('MYSQL_DB_NAME');

return [
    'i18n.locale' => 'en-US',
    'debug.allowedIPs' => ['127.0.0.1'],
    'db.dsn'        => "mysql:host=${mysqlHost};dbname=${mysqlDbName};charset=utf8",
    'db.username'   => getenv('MYSQL_USERNAME'),
    'db.password'   => getenv('MYSQL_PASSWORD'),
];
