<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://localhost:8761/eureka',
        'hostName' => 'clients_microservice',
        'appName' => 'Client',
        'ip' => '127.0.0.1',
        'port' => ['80', true],
        'homePageUrl' => 'http://localhost:80',
        'statusPageUrl' => 'http://localhost:80/info',
        'healthCheckUrl' => 'http://localhost:80/health'
    ]
];
