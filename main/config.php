<?php
return [
    'rootName' => $_SERVER['DOCUMENT_ROOT'] .'/../',
    'name' => 'N-algoritm',
    'defaultControllerName' => '',

    'components' => [
        'bd' => [
            'class' => \App\services\BD::class,
            'config' => [
                'user' => 'root',
                'pass' => '',
                'driver' => 'mysql',
                'bd' => 'gbphp',
                'host' => 'localhost:3307',
                'charset' => 'UTF8',
            ]
        ],
//        'userRepository' => [
//            'class' => \App\models\repositories\UserRepository::class
//        ],
//        'bookingRepository' => [
//            'class' => \App\models\repositories\BookingRepository::class
//        ]
    ],
];