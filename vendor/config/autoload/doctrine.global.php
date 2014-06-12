<?php

return array(
    'doctrine' => array(
        'driver' => array(
            'console_annotation_driver' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../../../module/Application/src/Application/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\\Entity' => 'console_annotation_driver',
                ),
            ),
        ),
        'migrations_configuration' => array(
            'orm_default' => array(
                'directory' => __DIR__ . '/../../../build/migrations',
                'namespace' => 'Migration',
                'table' => 'migrations',
            ),
        ),
    ),
);