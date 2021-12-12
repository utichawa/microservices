<?php

return [
    'server' => [
        'eurekaDefaultUrl' => 'http://discovery:8761/eureka/',
        'hostName' => 'clients_microservice',
        'appName' => 'Client',
        'ip' => '127.0.0.1',
        'port' => ['80', true],
        // 'homePageUrl' => 'http://discovery:80/eureka/',
        // 'statusPageUrl' => 'http://discovery:80/eureka',
        // 'healthCheckUrl' => 'http://discovery:80/health'
    ]
];
