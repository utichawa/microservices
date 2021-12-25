<?php

return [
    "host"      => 'http://config:8888/',
    "user"      => 'user',
    "password"  => 'user',
    "timeout"   => env("EXTERNAL_SERVICE_TIMEOUT", 5),
    "env"       => env("EXTERNAL_SERVICE_ENV", 'local'),
    "prefix"    => env("EXTERNAL_SERVICE_URI_PREFIX", ''),
];
