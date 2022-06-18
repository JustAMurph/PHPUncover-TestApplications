<?php

$applications = [
      'codeigniter' => [
          'path' => 'CodeIgniter3',
          'uri' => 'codeigniter'
      ],
    'laravel' => [
        'path' => 'Laravel/public',
        'uri' => 'laravel'
    ],
    'symfony' => [
        'path' => 'Symfony/public',
        'uri' => 'symfony'
    ],
    'slim' => [
        'path' => 'Slim/public',
        'uri' => 'slim'
    ],
    'cakephp' => [
        'path' => 'CakePHP4/webroot',
        'uri' => 'cakephp'
    ]
];

foreach($applications as $application) {
    if (preg_match('/^\/' . $application['uri'] . '/', $_SERVER['REQUEST_URI'])) {
        chdir($application['path']);
        $_SERVER['REQUEST_URI'] = str_replace($application['uri'], '', $_SERVER['REQUEST_URI']);
        require $application['path'] . DIRECTORY_SEPARATOR . 'index.php';
    }
}

