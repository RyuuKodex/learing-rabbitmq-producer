<?php

declare(strict_types=1);

namespace App\Command;

use App\Message\UserInfo;
use App\Repository\UserRepositoryInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:users:send-info',
)]
final class SendUsersInfoCommand extends Command
{
    public function __construct(private readonly UserRepositoryInterface $userRepository, private readonly MessageBusInterface $messageBus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = $this->userRepository->getAll();

        foreach ($users as $user) {
            $message = new UserInfo(
                $user->getId(),
                $user->getFirstName(),
                $user->getSurname(),
                $user->getEmail()
            );

            $this->messageBus->dispatch($message);
        }

        return Command::SUCCESS;
    }
}
