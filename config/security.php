<?php
use App\Security\LoginFormAuthenticator;

$container->loadFromExtension('security', [
    // ...
    'firewalls' => [
        'main' => [
            // ...,
            'guard' => [
                'authenticators' => [
                    LoginFormAuthenticator::class,
                ]
            ],
        ],
    ],
]);