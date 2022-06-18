<?php

declare(strict_types=1);

use App\Application\Actions\CommandInjection\FrameworkAction as CommandInjectionFrameworkAction;
use App\Application\Actions\LFI\FrameworkAction as LFIFrameworkAction;
use App\Application\Actions\LFI\PHPAction as LFIPHPAction;
use App\Application\Actions\SQLInjection\FrameworkAction as SQLIFrameworkAction;
use App\Application\Actions\SQLInjection\PHPAction as SQLIPHPAction;
use Slim\App;

use App\Application\Actions\CommandInjection\PHPAction as CommandInjectionPHPAction;

return function (App $app) {
    $app->get('ci', CommandInjectionPHPAction::class);
    $app->get('ci-framework', CommandInjectionFrameworkAction::class);

    $app->get('lfi', LFIPHPAction::class);
    $app->get('lfi-framework', LFIFrameworkAction::class);

    $app->get('sqli', SQLIPHPAction::class);
    $app->get('sqli-framework', SQLIFrameworkAction::class);
};
