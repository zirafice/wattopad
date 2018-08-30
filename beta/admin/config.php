<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 30.08.18
 * Time: 10:27
 */


return [
    'mode' => function(){
        if ($_SERVER['SERVER_NAME'] == 'local.osia' OR $_SERVER['SERVER_NAME'] == 'localhost'){
            return 'dev';
        }
        if ($_SERVER['SERVER_NAME'] == 'bel3s.osia.cz'){
            return 'test';
        }
    },
    'database' => [
        'dev' => [
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'wattopad'
        ],

        'test' => [
            'host' => '',
            'user' => '',
            'password' => '',
            'database' => ''
        ],

        'production' => [
            'host' => '',
            'user' => '',
            'password' => '',
            'database' => ''
        ]
    ],
    'baseDir' => [
        'dev' => '/wattopad/beta/admin'
    ],
    [
        'test' => 'web/'
    ],
    [
        'production' => ''
    ]
];