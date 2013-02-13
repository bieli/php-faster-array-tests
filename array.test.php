<?php

echo "=======\nINITIALIZE ARRAY TEST\n ======\n";

$sizeTest = (int) $_SERVER['argv'][1];

for ($size = 1000; $size < $sizeTest; $size *= 2) {
    echo PHP_EOL . "Testing size: $size" . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . PHP_EOL;

    for ($s = microtime(true), $container1 = Array(), $i = 0; $i < $size; $i++) {
        $container1[$i] = NULL;
    }
    echo "Array(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . PHP_EOL;

    for ($s = microtime(true), $container2 = new SplFixedArray($size), $i = 0; $i < $size; $i++) {
        $container2[$i] = NULL;
    }

    echo "SplArray(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . PHP_EOL;

    for ($s = microtime(true), $container3 = new Judy(Judy::INT_TO_INT), $i = 0; $i < $size; $i++) {
        $container3[$i] = 1234567890;
    }

    echo "Judy::INT_TO_INT(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . '; ' . 'JUDY_MEM: ' . $container3->memoryUsage() . PHP_EOL;

    for ($s = microtime(true), $container4 = new Judy(Judy::INT_TO_MIXED), $i = 0; $i < $size; $i++) {
        $container4[$i] = NULL;
    }

    echo "Judy::INT_TO_MIXED(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . '; ' . 'JUDY_MEM: ' . $container4->memoryUsage() . PHP_EOL;

} 

echo "=======\nADD RANDOM VALUE ARRAY TEST\n ======\n";

for ($size = 1000; $size < $sizeTest; $size *= 2) {
    echo PHP_EOL . "Testing size: $size" . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . PHP_EOL;

    $val = rand(1, 1234567890);

    for ($s = microtime(true), $container1 = Array(), $i = 0; $i < $size; $i++) {
        $container1[$i] = $val;
    }
    echo "Array(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . PHP_EOL;

    for ($s = microtime(true), $container2 = new SplFixedArray($size), $i = 0; $i < $size; $i++) {
        $container2[$i] = $val;
    }

    echo "SplArray(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . PHP_EOL;

    for ($s = microtime(true), $container3 = new Judy(Judy::INT_TO_INT), $i = 0; $i < $size; $i++) {
        $container3[$i] = $val;
    }

    echo "Judy::INT_TO_INT(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . '; ' . 'JUDY_MEM: ' . $container3->memoryUsage() . PHP_EOL;

    for ($s = microtime(true), $container4 = new Judy(Judy::INT_TO_MIXED), $i = 0; $i < $size; $i++) {
        $container4[$i] = $val;
    }

    echo "Judy::INT_TO_MIXED(): " . (microtime(true) - $s) . PHP_EOL;
    echo "MEM: " . memory_get_usage(true) . '; ' . 'JUDY_MEM: ' . $container4->memoryUsage() . PHP_EOL;

}




