<?php

function getDirContents($dir){
    $results = array();
    $files = scandir($dir);

    foreach($files as $key => $value){
        if(in_array($value, ['.', '..'])) continue;
        if(!is_dir($dir. DIRECTORY_SEPARATOR .$value)){
            $t = $dir. DIRECTORY_SEPARATOR .$value;
            if(pathinfo($t, PATHINFO_EXTENSION) == 'txt') {
//                var_dump(__LINE__,"a");
                $t = str_replace('.txt', '.tpl', $t);
                rename($dir. DIRECTORY_SEPARATOR .$value, $t);
            }
        } else if(is_dir($dir. DIRECTORY_SEPARATOR .$value)) {
            getDirContents($dir. DIRECTORY_SEPARATOR .$value);
        }
    }
}
//die(var_dump(__LINE__,__DIR__ . '/notes', is_dir(__DIR__ . '/notes')));
getDirContents(__DIR__ . '/notes');