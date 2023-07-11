<?php

return [

    /*
        Ovdje kazemo da cemo koristiti bcrypt
    */

    'driver' => 'bcrypt',

    /*
        Ovdje oderdujemo koliko ce nam vremena trebati za heširanje
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
        Ovdje govorimo kako da se hašira
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
