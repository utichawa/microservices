<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://localhost:8761/eureka/',
        'hostName' => 'localhost',
        'appName' => 'client-s',
        'ip' => '192.168.127.1',
        'port' => ['8763', true],
        'homePageUrl' => 'http://192.168.127.1:8763/client-s/',
        'statusPageUrl' => 'http://192.168.127.1:8763/client-s',
        'healthCheckUrl' => 'http://192.168.127.1:8763/health'
    ]
];
