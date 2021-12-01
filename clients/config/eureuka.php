<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://localhost:8761/eureka',
        'hostName' => 'service.hamid.work',
        'appName' => 'service',
        'ip' => '127.0.0.1',
        'port' => ['8080', true],
        'homePageUrl' => 'http://localhost:8080',
        'statusPageUrl' => 'http://localhost:8080/info',
        'healthCheckUrl' => 'http://localhost:8080/health'
    ]
];
