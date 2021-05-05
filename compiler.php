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

        if(strpos($line, "<note file=") !== false) {
            list(,$fn) = explode("'", $line);
            $inputNoteFilename = __DIR__ . '/' . $fn;
            $outputLines = array_merge($outputLines, compiler($inputNoteFilename));
            continue;
        }

        $outputLines[] = $line;
    }

    return $outputLines;
}

$outputLines = compiler($inputFilename);
$outputLines[] = 'v0.8.0 [' . date('Y-m-d H:i:s') . ']';
echo "Done.\n\n";

file_put_contents($outputFilename, implode("\n", $outputLines));