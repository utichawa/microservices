<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://serviceregistry:8761/eureka/',
        'hostName' => 'commande-service',
        'appName' => 'commande-service',
        'ip' => 'localhost',
        'port' => ['8001', true],
        'homePageUrl' => 'http://localhost:8001',
        'statusPageUrl' => 'http://localhost:8001',
        'healthCheckUrl' => 'http://localhost:8001/health'
    ]
];
