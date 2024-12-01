<?php

namespace App\Enum;

enum StatusEnum: string
{
    case Default = 'Default Status'; // Ensure this exists if you're using it
    case Submitted = "Submitted";
    case Approved = "Approved";
    case Refused = "Refused";
    case Assigned = "Assigned";
    case Accepted = "Accepted";
    case Forwarded = "Forwarded";
    case Clarified = "Clarified";
    case Finished = "Finished";
    case Ended = "Ended";
    case Returned = "Returned";
    case Closed = "Closed";
    case Canceled = "Canceled";

    public function color(): string
    {
        return match ($this) {
            self::Submitted => '#FFA500',    // Orange: Waiting for action
            self::Approved => '#008000',     // Green: Approved or successful
            self::Refused => '#FF0000',      // Red: Rejected or failed
            self::Assigned => '#1E90FF',     // Blue: Assigned to someone (in progress)
            self::Accepted => '#32CD32',     // Lime Green: Accepted or acknowledged
            self::Forwarded => '#FFD700',    // Gold: Forwarded (pending next action)
            self::Clarified => '#00CED1',    // Dark Turquoise: Clarified or clear
            self::Ended => '#4682FF',     // nile Blue: not Completed, but calm
            self::Finished => '#4682B4',     // Steel Blue: Completed, but calm
            self::Returned => '#FF4500',     // Orange Red: Sent back (needs attention)
            self::Closed => '#808080',       // Grey: Closed or no further action
            self::Canceled => '#000000',     // Black: Canceled or terminated
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Submitted => 'hourglass-half',    // Icon for "Waiting for action"
            self::Approved => 'check-circle',       // Icon for "Approved or successful"
            self::Refused => 'times-circle',        // Icon for "Rejected or failed"
            self::Assigned => 'user-tag',           // Icon for "Assigned to someone (in progress)"
            self::Accepted => 'thumbs-up',          // Icon for "Accepted or acknowledged"
            self::Forwarded => 'share',             // Icon for "Forwarded (pending next action)"
            self::Clarified => 'info-circle',       // Icon for "Clarified or clear"
            self::Ended => 'circle-pause',     // Icon for "not Completed, but calm"
            self::Finished => 'flag-checkered',     // Icon for "Completed, but calm"
            self::Returned => 'undo',               // Icon for "Sent back (needs attention)"
            self::Closed => 'lock',                 // Icon for "Closed or no further action"
            self::Canceled => 'ban',                // Icon for "Canceled or terminated"
        };
    }

    public function rank(): int
    {
        return match ($this) {
            self::Refused => 10000,
            self::Submitted => 10001,
            self::Approved => 10002,
            self::Assigned => 10003,
            self::Accepted => 10004,
            self::Forwarded => 10005,
            self::Clarified => 10006,
            self::Returned => 10007,
            self::Ended => 10008,
            self::Finished => 10009,
            self::Closed => 10010,
            self::Canceled => 11000,
        };
    }

    public static function fromString(string $status): ?self
    {
        return match ($status) {
            'Refused' => self::Refused,
            'Submitted' => self::Submitted,
            'Approved' => self::Approved,
            'Assigned' => self::Assigned,
            'Accepted' => self::Accepted,
            'Forwarded' => self::Forwarded,
            'Clarified' => self::Clarified,
            'Returned' => self::Returned,
            'Ended' => self::Ended,
            'Finished' => self::Finished,
            'Closed' => self::Closed,
            'Canceled' => self::Canceled,
            default => self::Submitted,
        };
    }

    public function group(): string
    {
        return match ($this) {
            self::Refused => 'Canceled',
            self::Submitted => 'Preparation',
            self::Approved => 'Preparation',
            self::Assigned => 'Preparation',
            self::Accepted => 'Working',
            self::Forwarded => 'Working',
            self::Clarified => 'Working',
            self::Returned => 'Working',
            self::Ended => 'Working',
            self::Finished => 'Finished',
            self::Closed => 'Finished',
            self::Canceled => 'Canceled'
        };
    }
}