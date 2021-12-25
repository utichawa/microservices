<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://serviceregistry:8761/eureka/',
        'hostName' => 'reclamation-service',
        'appName' => 'reclamation-service',
        'ip' => 'localhost',
        'port' => ['8003', true],
        'homePageUrl' => 'http://localhost:8003',
        'statusPageUrl' => 'http://localhost:8003',
        'healthCheckUrl' => 'http://localhost:8003/health'
    ]
];
