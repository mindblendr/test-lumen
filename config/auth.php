<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
		'admin' => [
			'driver' => 'jwt',
			'provider' => 'admins'
		],
		'player' => [
			'driver' => 'jwt',
			'provider' => 'players'
		]
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class
		],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'players' => [
            'driver' => 'eloquent',
            'model' => App\Models\Player::class,
        ],
    ]
];