<?php

echo "\nText compiler\nVersion 0.1\nAnton (Liloi) Moskalenko\n\n";

$inputFilename = __DIR__ . '/' . $argv[1];
$outputFilename = __DIR__ . '/' . $argv[2];

function compiler($inputFilename): array
{
    echo $inputFilename . "\n";
    $inputData = file_get_contents($inputFilename);
    $inputLines = explode("\n", $inputData);

    $outputLines = [];

    foreach($inputLines as $line) {
        $outputLines[] = $line;
    }

    return $outputLines;
}

$outputLines = compiler($inputFilename);
echo "Done.\n\n";

file_put_contents($outputFilename, implode("\n", $outputLines));