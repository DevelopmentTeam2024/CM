<?php

namespace App\Enum;

enum DepartmentEnum: string
{
    case Administration = "Administration";
    case Quality = "Quality";
    case Sales = "Sales";
    case TechnicalOffice = "Technical Office";
    case Production = "Production";
    public static function list(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}