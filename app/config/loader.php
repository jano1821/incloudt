<?php

$loaderdir = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loaderdir->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->formsDir,
        $config->application->beansDir           
    ]
)->register();

$loaderclass = new \Phalcon\Loader();

$loaderclass->registerClasses(
    [
        'soapclient'         => 'library/nusoap.php',
    ]
);
$loaderclass->register();
