<?php

namespace App\Enum;

enum RoleEnum: string
{

    case Manager = "Manager";
    case GeneralSupervisor = "General Supervisor";
    case Supervisor = "Supervisor";
    case Employee = "Employee";
    case Worker = "Worker";
    case Admin = "Admin";
    public static function list(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}