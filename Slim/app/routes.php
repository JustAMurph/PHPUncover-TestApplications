<?php

declare(strict_types=1);

use App\Application\Actions\CommandInjection\CommandInjectionFrameworkAction;
use App\Application\Actions\CommandInjection\CommandInjectionPHPAction;
use App\Application\Actions\LFI\LFIFrameworkAction;
use App\Application\Actions\LFI\LFIPHPAction;
use App\Application\Actions\SQLInjection\SQLInjectionFrameworkAction;
use App\Application\Actions\SQLInjection\SQLInjectionPHPAction;
use Slim\App;


return function (App $app) {
    $app->get('ci', CommandInjectionPHPAction::class);
    $app->get('ci-framework', CommandInjectionFrameworkAction::class);

    $app->get('lfi', LFIPHPAction::class);
    $app->get('lfi-framework', LFIFrameworkAction::class);

    $app->get('sqli', SQLInjectionPHPAction::class);
    $app->get('sqli-framework', SQLInjectionFrameworkAction::class);
};
