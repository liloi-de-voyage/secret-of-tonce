#!/usr/bin/php
<?php

function commandCompile($dir) {
    $results = [];
    $files = scandir($dir);

    $dirPool = str_replace('/atoms', '/pool', $dir);
    if(!is_dir($dirPool)) {
        mkdir($dirPool, 0777, true);
    }

    foreach($files as $key => $value){
        if(in_array($value, ['.git'])) {
            continue;
        }

        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);

        if(!is_dir($path)) {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = pathinfo($path, PATHINFO_BASENAME);

            if($ext!="html") {
                continue;
            }

          $s = $path;
          $s = str_replace('/drive/b/projects/secret-of-tonce', '.', $s);
          $results[] = '<tr><td>0%</td><td>' . '<a target="_blank" href="' . $s . '">' . $name . '</a></td></tr>';

        } elseif($value != "." && $value != "..") {
            $results = array_merge($results, commandCompile($path));
        }
    }

    return $results;
}

$trs = commandCompile(__DIR__ . '/notes');
die(var_dump(implode("\n", $trs)));

$s = file_get_contents(__DIR__ . '/map.tpl');
$n = str_replace("<content/>",implode("\n", $trs),$s);
file_put_contents(__DIR__ . '/map.html',$n);