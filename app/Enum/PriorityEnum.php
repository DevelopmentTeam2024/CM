<?php

namespace App\Enum;

use function PHPUnit\Framework\matches;

enum PriorityEnum: string
{
    case Normal = "Normal";
    case Urgent = "Urgent";
    case Emergency = "Emergency";

    function rank(): int
    {
        return match ($this) {
            self::Normal => 0,
            self::Urgent => 1,
            self::Emergency => 2,
        };
    }

    function color(): string
    {
        return match ($this) {
            self::Normal => '#33FF57',   // Bright Green
            self::Urgent => '#FFCC33',  // Bright Yellow
            self::Emergency => '#FF3333',    // Bright Red
        };
    }

    function icon(): string
    {
        return match ($this) {
            self::Normal => 'check-circle',    // Icon for Normal priority (e.g. checkmark)
            self::Urgent => 'exclamation-circle',  // Icon for Urgent priority (e.g. exclamation mark)
            self::Emergency => 'exclamation-triangle',    // Icon for Emergency priority (e.g. warning triangle)
        };
    }
}