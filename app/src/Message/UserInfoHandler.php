<?php

declare(strict_types=1);

namespace App\Message;

use App\Repository\UserRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class UserInfoHandler
{
    public function __invoke(UserInfo $userInfo): void
    {
    }
}
