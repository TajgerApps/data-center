<?php

declare(strict_types=1);

namespace App\Security;

class Roles
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_CUSTOMER = 'ROLE_CLIENT';

    public static function getRoles(): array
    {
        return [
            self::ROLE_ADMIN => self::ROLE_ADMIN,
            self::ROLE_USER => self::ROLE_USER,
            self::ROLE_CUSTOMER => self::ROLE_CUSTOMER,
        ];
    }
}
