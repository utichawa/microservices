<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://discovery:8761/eureka/',
        'hostName' => 'client-service',
        'appName' => 'client-service',
        'ip' => 'discovery',
        'port' => ['8000', true],
        'homePageUrl' => 'http://discovery:8000',
        'statusPageUrl' => 'http://discovery:8000',
        'healthCheckUrl' => 'http://discovery:8000/health'
    ]
];
