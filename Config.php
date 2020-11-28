<?php

return [
    'uid' => 'novel-secret-of-tonce',
    'application' => \Liloi\Umklaidet\Application::class,
    'parameter' => __DIR__ . '/Novel.story',
    'list' => [
        'road' => __DIR__ . '/Road/Chapter.story',
        'cottage' => __DIR__ . '/Cottage/Chapter.story',
        'library' => __DIR__ . '/Library/Chapter.story',
        'hotel-room' => __DIR__ . '/HotelRoom/Chapter.story',
        'cafe' => __DIR__ . '/Cafe/Chapter.story',
        'questionnaire' => __DIR__ . '/Questionnaire/Chapter.story',
        'safety-engineering' => __DIR__ . '/SafetyEngineering/Chapter.story',
    ]
];