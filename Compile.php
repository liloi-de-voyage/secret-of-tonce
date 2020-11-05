<?php

$stories = [
    __DIR__ . '/Teacher/Story.txt',
    __DIR__ . '/Rookies/Story.txt',
    __DIR__ . '/Lectures/Story.txt',
    __DIR__ . '/Cyborg/Story.txt',
    __DIR__ . '/AboveKarmansLine/Story.txt',
    __DIR__ . '/Holiday/Story.txt',
    __DIR__ . '/Hawking/Story.txt',
    __DIR__ . '/MyDay/Story.txt',
    __DIR__ . '/Moon/Story.txt',
    __DIR__ . '/Quest/Story.txt',
    __DIR__ . '/Reports/Story.txt',
    __DIR__ . '/Bologna/Story.txt',
];

$output = [
    'Загадка Тонсу',
    ''
];

foreach ($stories as $story)
{
    $output = array_merge($output, explode("\n", file_get_contents($story)));
}

file_put_contents(__DIR__ . '/SecretOfTonce.txt', implode("\n", $output));