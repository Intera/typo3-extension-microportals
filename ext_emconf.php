<?php
/** @noinspection PhpMissingStrictTypesDeclarationInspection */

/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Microportals',
    'description' => 'Generate microportals with a menu content element.',
    'category' => 'plugin',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Alexander Stehlik',
    'author_email' => 'astehlik@intera.de',
    'author_company' => 'Intera GmbH',
    'version' => '1.0.0',
    'constraints' =>
        [
            'depends' => ['typo3' => '9.5.0-9.5.99'],
            'conflicts' => [],
            'suggests' => [],
        ],
];
