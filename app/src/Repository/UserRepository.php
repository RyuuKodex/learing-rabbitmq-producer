<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Symfony\Component\Uid\Uuid;

class UserRepository implements UserRepositoryInterface
{
    /** @var User[] */
    private array $users;

    public function __construct()
    {
        $usersData = include '/app/data/users.php';

        foreach ($usersData as $data) {
            $user = new User(Uuid::fromString($data['id']), $data['firstName'], $data['surname'], $data['email']);
            $this->users[] = $user;
        }
    }

    /** @return User[] */
    public function getAll(): array
    {
        return $this->users;
    }
}
