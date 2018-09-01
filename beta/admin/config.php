<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 30.08.18
 * Time: 10:27
 */


return [
    'mode' => function(){
        if ($_SERVER['SERVER_NAME'] == 'local.osia' || $_SERVER['SERVER_NAME'] == 'localhost'){
            return 'dev';
        }
        if ($_SERVER['SERVER_NAME'] == ''){
            return 'test';
        }
        // Kdyz se nejedna o test ani o dev tak vrat produkction
        return 'production';
    },
    // nastaveni pristupu k databazi
    'database' => [
        // dev/local vychozi nastaveni
        'dev' => [
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'wattopad'
        ],
        // test na hostingu
        'test' => [
            'host' => '',
            'user' => '',
            'password' => '',
            'database' => ''
        ],
        // Produkcni nastaveni
        'production' => [
            'host' => '',
            'user' => '',
            'password' => '',
            'database' => ''
        ]
    ],
    // base Dir nastaveni
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