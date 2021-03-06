<?php

return [
    'create'        => [
        'description'   => 'Új esemény létrehozása',
        'success'       => '\':name\' eseményt létrehoztuk',
        'title'         => 'Új esemény',
    ],
    'destroy'       => [
        'success'   => '\':name\' eseményt töröltük.',
    ],
    'edit'          => [
        'success'   => '\':name\' eseményt frissítettük.',
        'title'     => ':name esemény szerkesztése',
    ],
    'fields'        => [
        'date'      => 'Dátum',
        'image'     => 'Kép',
        'location'  => 'Helyszín',
        'name'      => 'Megnevezés',
        'type'      => 'Típus',
    ],
    'index'         => [
        'add'           => 'Új esemény',
        'description'   => ':name eseményeinek kezelése',
        'header'        => ':name eseményei',
        'title'         => 'Események',
    ],
    'placeholders'  => [
        'date'      => 'Az eseményed dátuma',
        'location'  => 'Válassz ki egy helyszínt!',
        'name'      => 'Az esemény neve',
        'type'      => 'Szertartás, ünnepség, katasztrófa, csata, születés',
    ],
    'show'          => [
        'description'   => 'Egy esemény részletes nézete',
        'tabs'          => [
            'information'   => 'Információ',
        ],
        'title'         => ':name esemény',
    ],
    'tabs'          => [
        'calendars' => 'Naptári bejegyzések',
    ],
];
