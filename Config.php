<?php

return [
    'application' => \Liloi\Umklaidet\Application::class,
    'parameter' => __DIR__ . '/Novel.story',
    'list' => [
        'road' => __DIR__ . '/Road/Chapter.story',
        'cottage' => __DIR__ . '/Cottage/Chapter.story',
        'library' => __DIR__ . '/Library/Chapter.story',
        'hotel-room' => __DIR__ . '/HotelRoom/Chapter.story',
    ]
];