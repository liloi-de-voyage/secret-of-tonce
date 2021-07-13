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

            if($ext!="tpl") {
                continue;
            }
          $n = str_replace('.tpl','.html',$path);
          rename($path, $n);
        } elseif($value != "." && $value != "..") {
            commandCompile($path);
        }
    }

    return $results;
}

commandCompile(__DIR__ . '/notes');