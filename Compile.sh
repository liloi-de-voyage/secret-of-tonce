#!/usr/bin/php
<?php

$output = [];

$rows = explode("\n", file_get_contents(__DIR__ . '/Template.xml'));

foreach ($rows as $row)
{
    if(strpos($row, '<load') != false)
    {
        list(,$filename) = explode('"', $row);
        $list = explode("\n", file_get_contents(__DIR__ . $filename));
        array_shift($list);
        $output = array_merge($output, $list);
        continue;
    }

    $output[] = $row;
}

file_put_contents(__DIR__ . '/SecretOfTonce.fb2', implode("\n", $output));