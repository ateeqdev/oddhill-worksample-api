<?php

return [
    'defaults' => [
        'pagination' => [
            'per_page' => 15,
            'max_per_page' => 100,
        ],
        'format' => [
            'datetime' => 'Y-m-d H:i:s',
        ],
    ],

    'versions' => [
        'v1' => [
            'prefix' => 'v1',
            'namespace' => 'App\Http\Controllers\API\V1',
        ],
    ],

    'response' => [
        'structure' => [
            'status' => 'status',
            'message' => 'message',
            'data' => 'data',
            'errors' => 'errors',
            'meta' => 'meta',
        ],
    ],
];
