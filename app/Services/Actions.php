<?php

namespace App\Services;

class Actions
{
    private static function reviseAction(): array
{
    return [
        'action' => 'Revise',
        'status' => 'Finished',
        'notes' => [
            'shown' => false,
            'required' => false // Notes are required for revise to explain why it's being revised
        ],
        'attachments' => [
            'shown' => true,
            'required' => false // Attachments are optional during revise
        ],
        'set_priority' => true, // Allow priority to be set during revise
        'set_expected_date' => true, // Allow expected date to be updated
        'set_expected_minutes' => false, // Minutes update not needed during revise
        'change_order_number' => true, // Order/serial number changes for a revise
        'set_checker_id' => false, // Checker ID not required during revise
        'items_count' => true, // Items count must be verified
    ];
}
    private static function cancelAction(): array
    {
        return [
            'action' => 'Cancel',
            'status' => 'Canceled',
            'notes' => [
                'shown' => true,
                'required' => true
            ],
            'attachments' => [
                'shown' => false,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function editAction(): array
    {
        return [
            'action' => 'Edit',
            'status' => 'Submitted',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => true,
                'required' => false
            ],
            'set_priority' => true,
            'set_expected_date' => true,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function resubmitAction(): array
    {
        return [
            'action' => 'Resubmit',
            'status' => 'Submitted',
            'notes' => [
                'shown' => true,
                'required' => true
            ],
            'attachments' => [
                'shown' => true,
                'required' => true
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function clarifyAction(): array
    {
        return [
            'action' => 'Clarify',
            'status' => 'Clarified',
            'notes' => [
                'shown' => true,
                'required' => true
            ],
            'attachments' => [
                'shown' => true,
                'required' => true
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function returnAction(): array
    {
        return [
            'action' => 'Return',
            'status' => 'Returned',
            'notes' => [
                'shown' => true,
                'required' => true
            ],
            'attachments' => [
                'shown' => true,
                'required' => true
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function closeAction(): array
    {
        return [
            'action' => 'Close',
            'status' => 'Closed',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => false,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function approveAction(): array
    {
        return [
            'action' => 'Approve',
            'status' => 'Approved',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => false,
                'required' => false
            ],
            'set_priority' => true,
            'set_expected_date' => true,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function refuseAction(): array
    {
        return [
            'action' => 'Refuse',
            'status' => 'Refused',
            'notes' => [
                'shown' => true,
                'required' => true
            ],
            'attachments' => [
                'shown' => true,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function assignAction(): array
    {
        return [
            'action' => 'Assign',
            'status' => 'Assigned',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => false,
                'required' => false
            ],
            'set_priority' => true,
            'set_expected_date' => true,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => true,
            'items_count' => false,
        ];
    }

    private static function acceptAction(): array
    {
        return [
            'action' => 'Accept',
            'status' => 'Accepted',
            'notes' => [
                'shown' => false,
                'required' => false
            ],
            'attachments' => [
                'shown' => false,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => true,
            'set_expected_minutes' => true,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function finishAction(): array
    {
        return [
            'action' => 'Finish',
            'status' => 'Finished',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => true,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => true,
        ];
    }

    private static function endAction(): array
    {
        return [
            'action' => 'End',
            'status' => 'Ended',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => true,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    private static function forwardAction(): array
    {
        return [
            'action' => 'Forward',
            'status' => 'Forwarded',
            'notes' => [
                'shown' => true,
                'required' => false
            ],
            'attachments' => [
                'shown' => true,
                'required' => false
            ],
            'set_priority' => true,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }
    private static function noAction()
    {
        return [
            'action' => false,
            'status' => false,
            'notes' => [
                'shown' => false,
                'required' => false
            ],
            'attachments' => [
                'shown' => false,
                'required' => false
            ],
            'set_priority' => false,
            'set_expected_date' => false,
            'set_expected_minutes' => false,
            'change_order_number' => false,
            'set_checker_id' => false,
            'items_count' => false,
        ];
    }

    public static function run(string $action)
    {
        $methodName = strtolower($action) . 'Action';
        if (method_exists(self::class, $methodName)) {
            return self::$methodName();
        } else {
            return self::noAction();
        }
    }
}
