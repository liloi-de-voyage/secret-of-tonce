<?php

echo "\nText compiler\nVersion 0.1\nAnton (Liloi) Moskalenko\n\n";

$inputFilename = __DIR__ . '/' . $argv[1];
$outputFilename = __DIR__ . '/' . $argv[2];
$count = 0;

function compiler($inputFilename, &$count): array
{
    echo (++$count) . $inputFilename . "\n";
    $inputData = file_get_contents($inputFilename);
    $inputLines = explode("\n", $inputData);

    $outputLines = [];

    foreach($inputLines as $line) {

        if(strpos($line, "<note file=") !== false) {
            list(,$fn) = explode("'", $line);
            $inputNoteFilename = __DIR__ . '/' . $fn;
            $outputLines = array_merge($outputLines, compiler($inputNoteFilename, $count));
            continue;
        }

        $outputLines[] = $line;
    }

    return $outputLines;
}

$outputLines = compiler($inputFilename, $count);
$outputLines[] = 'v0.8.0';
echo "Done.\n\n";

file_put_contents($outputFilename, implode("\n", $outputLines));