<?php

namespace App\Constants;

class UserRole
{
    public const ADMIN = 1;
    public const CLIENT = 2;
    public const STAFF = 3;

    public static function all(): array
    {
        return [
            self::ADMIN,
            self::CLIENT,
            self::STAFF,
        ];
    }

    public static function adminRoles(): array
    {
        return [
            self::ADMIN,
            self::STAFF,
        ];
    }

    public static function labels(): array
    {
        return [
            self::ADMIN => 'Admin',
            self::CLIENT => 'Client',
            self::STAFF => 'Staff',
        ];
    }

    public static function label(int $role): string
    {
        return self::labels()[$role] ?? 'Unknown';
    }
}
