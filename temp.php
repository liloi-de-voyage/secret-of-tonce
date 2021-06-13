<?php

function getDirContents($dir){
    $results = array();
    $files = scandir($dir);

    foreach($files as $key => $value){
        if(in_array($value, ['.', '..'])) continue;
        if(!is_dir($dir. DIRECTORY_SEPARATOR .$value)){
            $t = $dir. DIRECTORY_SEPARATOR .$value;
            if(pathinfo($t, PATHINFO_EXTENSION) == 'tpl') {
//                var_dump(__LINE__,"a");
                $l = explode("\n", file_get_contents($dir. DIRECTORY_SEPARATOR .$value));
                foreach($l as &$a) {
                    if(strpos($a, '<p>') === 0) {
                        $a = $a . '</p>';
                    }
                }
                unset($a);
                file_put_contents($dir. DIRECTORY_SEPARATOR .$value, implode("\n", $l));
            }
        } else if(is_dir($dir. DIRECTORY_SEPARATOR .$value)) {
            getDirContents($dir. DIRECTORY_SEPARATOR .$value);
        }
    }
}
//die(var_dump(__LINE__,__DIR__ . '/notes', is_dir(__DIR__ . '/notes')));
getDirContents(__DIR__ . '/notes');