<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://serviceregistry:8761/eureka/',
        'hostName' => 'product-service',
        'appName' => 'product-service',
        'ip' => 'localhost',
        'port' => ['8002', true],
        'homePageUrl' => 'http://localhost:8002',
        'statusPageUrl' => 'http://localhost:8002',
        'healthCheckUrl' => 'http://localhost:8002/health'
    ]
];
