<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://localhost:8761/eureka/',
        'hostName' => 'commande-service',
        'appName' => 'commande-service',
        'ip' => 'localhost',
        'port' => ['8000', true],
        'homePageUrl' => 'http://localhost:8000',
        'statusPageUrl' => 'http://localhost:8000',
        'healthCheckUrl' => 'http://localhost:8000/health'
    ]
];
