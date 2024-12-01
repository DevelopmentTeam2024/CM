<?php

namespace App\Enum;

enum BranchEnum: string
{
    case Riyadh = "Riyadh";
    case Jeddah = "Jeddah";
    case Dammam = "Dammam";
    case Cairo = "Cairo";
    public static function list(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}