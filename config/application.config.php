<?php
return array(
    'modules' => array(
        'ZendDeveloperTools',
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
            sprintf('config/autoload/{,*.}{global,%s,local}.php', getenv('APP_ENV'))
        ),
    ),
);
