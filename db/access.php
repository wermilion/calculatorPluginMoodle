<?php
declare(strict_types=1);

$capabilities = [
    'block/calculator:addinstance' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => true,
        ],
    ],
    'block/calculator:myaddinstance' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => [
            'user' => true,
        ],
    ],
];