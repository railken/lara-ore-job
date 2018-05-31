<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    |
    | This is the table used to save disks to the database
    |
    */
    'table' => 'ore_works',

    'workers' => [
    	'email' => \Railken\LaraOre\Workers\EmailWorker::class
    ]
];
