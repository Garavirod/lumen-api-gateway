<?php

return [
    'authors' => [
        'base_uri' => env('AUTHORS_SERVICE_BASE_URL'),
        'secrets' => env('AUTHORS_SERVICE_SECRET')    
    ],

    'books' => [
        'base_uri' => env('BOOKS_SERVICE_BASE_URL'),
        'secrets' => env('BOOKS_SERVICE_SECRET')
    ]
];