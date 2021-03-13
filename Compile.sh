#!/usr/bin/php
<?php

$stories = [
];

$output = explode("\n", file_get_contents(__DIR__ . '/Template.xml'));

foreach ($stories as $story)
{
    $output = array_merge($output, explode("\n", file_get_contents($story)));
}

file_put_contents(__DIR__ . '/SecretOfTonce.fb2', implode("\n", $output));