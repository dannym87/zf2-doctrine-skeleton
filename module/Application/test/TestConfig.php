<?php

return array(
    // This should be an array of module namespaces used in the application.
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'Application',
    ),

    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),

        'config_glob_paths' => array(
            sprintf(__DIR__ . '/../../../config/autoload/{,*.}{global,%s,local}.php', getenv('APP_ENV'))
        ),
    ),
);
