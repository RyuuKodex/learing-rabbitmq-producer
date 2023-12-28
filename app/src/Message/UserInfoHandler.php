<?php

declare(strict_types=1);

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class UserInfoHandler
{
    public function __invoke(UserInfo $userInfo): void
    {
    }
}
