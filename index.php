<?php

use Symfony\Component\HttpFoundation\BinaryFileResponse;

require 'vendor/autoload.php';

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

$rewriteUrls = [
    'REQUEST_URI',
    'PHP_SELF',
    'PATH_INFO'
];

foreach($applications as $application) {
    if (preg_match('/^\/' . $application['uri'] . '/', $_SERVER['REQUEST_URI'])) {
        chdir($application['path']);

        foreach($rewriteUrls as $url) {
            if (!isset($_SERVER[$url])) {
                continue;
            }
            $_SERVER[$url] = str_replace('/' . $application['uri'], '', $_SERVER[$url]);
        }

        if (strpos($_SERVER['REQUEST_URI'], '.css') !== false) {
            $response = new BinaryFileResponse(trim($_SERVER['REQUEST_URI'], '/'));
            $response->headers->set('Content-Type', 'text/css');
            $response->send();
            return;
        }

        $filename = $application['path'] . DIRECTORY_SEPARATOR . 'index.php';
        $_SERVER['SCRIPT_FILENAME'] = 'index.php';
        require $filename;
    }
}

