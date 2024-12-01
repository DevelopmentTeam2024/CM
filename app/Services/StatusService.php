<?php

namespace App\Services;

use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use App\Services\Actions;

class StatusService
{
    public $user;
    public $status;

    public function __construct(Status $status = null)
    {
        $this->user = Auth::user();
        $this->status = $status;
    }

    // public function actionsList(): array
    // {
    //     return [
    //         'Cancel' => [
    //             'action' => 'Cancel',
    //             'status' => 'Canceled',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'attachments' => [
    //                 'shown' => false,
    //                 'required' => false
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Edit'  => [
    //             'action' => 'Edit',
    //             'status' => 'Submitted',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'set_priority' => true,
    //             'set_expected_date' => true,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Resubmit'  => [
    //             'action' => 'Resubmit',
    //             'status' => 'Submitted',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Clarify'  => [
    //             'action' => 'Clarify',
    //             'status' => 'Clarified',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Return'  => [
    //             'action' => 'Return',
    //             'status' => 'Returned',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Close'  => [
    //             'action' => 'Close',
    //             'status' => 'Closed',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Approve'  => [
    //             'action' => 'Approve',
    //             'status' => 'Approved',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => false,
    //                 'required' => false
    //             ],
    //             'set_priority' => true,
    //             'set_expected_date' => true,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Refuse'  => [
    //             'action' => 'Refuse',
    //             'status' => 'Refused',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => true
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Assign'  => [
    //             'action' => 'Assign',
    //             'status' => 'Assigned',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => false,
    //                 'required' => false
    //             ],
    //             'set_priority' => true,
    //             'set_expected_date' => true,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => true,
    //         ],
    //         'Accept'  => [
    //             'action' => 'Accept',
    //             'status' => 'Accepted',
    //             'notes' => [
    //                 'shown' => false,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => false,
    //                 'required' => false
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => true,
    //             'set_expected_minutes' => true,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Finish'  => [
    //             'action' => 'Finish',
    //             'status' => 'Finished',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'set_priority' => false,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],
    //         'Forward'  => [
    //             'action' => 'Forward',
    //             'status' => 'Forwarded',
    //             'notes' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'attachments' => [
    //                 'shown' => true,
    //                 'required' => false
    //             ],
    //             'set_priority' => true,
    //             'set_expected_date' => false,
    //             'set_expected_minutes' => false,
    //             'change_order_number' => false,
    //             'set_checker_id' => false,
    //         ],

    //     ];
    // }

    // public function getActionfromList(string $action)
    // {
    //     $actions = $this->actionsList();
    //     return $actions[$action] ?? $this->noActionRequired();
    // }

    // private function noActionRequired()
    // {
    //     return [
    //         'action' => false,
    //         'status' => false,
    //         'notes' => [
    //             'shown' => false,
    //             'required' => false
    //         ],
    //         'attachments' => [
    //             'shown' => false,
    //             'required' => false
    //         ],
    //         'set_priority' => false,
    //         'set_expected_date' => false,
    //         'set_expected_minutes' => false,
    //         'change_order_number' => false,
    //         'set_checker_id' => false,
    //     ];
    // }

    public function canEditCurrentStatus(bool $set_priority, bool $set_expected_date, bool $set_expected_minutes)
    {
        $can_edit = false;
        if ($set_priority || $set_expected_date || $set_expected_minutes) {
            $can_edit = true;
        }
        return [
            'can_edit' => $can_edit,
            'set_priority' => $set_priority,
            'set_expected_date' => $set_expected_date,
            'set_expected_minutes' => $set_expected_minutes
        ];
    }

    private function cantDoAnything()
    {
        return [
            'actions' => [
                'Action' => Actions::run('no'),
            ],
            'current_status' => $this->canEditCurrentStatus(false, false, false)
        ];
    }

    // private function checkRequiredRole(string $role, string $department = null)
    // {
    //     if (is_null($department) && $this->user->role->value == $role) {
    //         return true;
    //     } elseif ($this->user->department->value == $department && $this->user->role->value == $role) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    private function checkPrivileges(string $department, array $roles = [])
    {
        // Allow access if the user is an Admin
        if ($this->user->role->value === 'Admin') {
            return true;
        }
        // Deny access if the department does not match
        if ($department !== $this->user->department->value) {
            return false;
        }
        // Deny access if specific roles are required and the user's role is not in those roles
        if (!empty($roles) && !in_array($this->user->role->value, $roles)) {
            return false;
        }
        // All checks passed, grant access
        return true;
    }

    private function checkCurrentStatus(array $statuses): bool
    {
        if (is_null($this->status)) {
            return false;
        }

        return in_array($this->status->status->value, $statuses);
    }

    public function getActions()
    {
        if (is_null($this->status)) {
            return $this->cantDoAnything();
        }

        $status = $this->status->status->value;

        // if ($this->checkPrivileges('Administration', ['Admin'])) {
        //     $statuses = ['Submitted', 'Approved', 'Assigned','Accepted','Clarified','Ended', 'Returned', 'Closed','Canceled', 'Refused', 'Forwarded', 'Finished'];
        //     if ($this->checkCurrentStatus($statuses)) {
        //         return match ($status) {
        //             'Submitted' => [
        //                 'actions' => [
        //                     'Approve' => Actions::run('Approve'),
        //                     'Refuse' => Actions::run('Refuse'),
        //                     'Edit'  => Actions::run('Edit')
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
        //             ],
        //             'Approved','Assigned' => [
        //                 'actions' => [
        //                     'Cancel' => Actions::run('Cancel'),
        //                     'Edit'  => Actions::run('Edit'),
        //                     'Assign' => Actions::run('Assign'),
        //                     'Refuse' => Actions::run('Refuse'),
        //                     'Accept' => Actions::run('Accept'),
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
        //             ],
        //             'Refused' => [
        //                 'actions' => [
        //                     'Resubmit' => Actions::run('Resubmit'),
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
        //             ],
        //             'Forwarded' => [
        //                 'actions' => [
        //                     'Clarify' => Actions::run('Clarify'),
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
        //             ],
        //             'Finished' => [
        //                 'actions' => [
        //                     'Return' => Actions::run('Return'),
        //                     'Close' => Actions::run('Close'),
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
        //             ],
                    
        //             'Accepted', 'Clarified', 'Returned' => [
        //                 'actions' => [
        //                     'Finish' => Actions::run('Finish'),
        //                     'Refuse' => Actions::run('Refuse'),
        //                     'Forward' => Actions::run('Forward'),
        //                     'Assign' => Actions::run('Assign'),
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, true, true)
        //             ],
        //             'Ended' => [
        //                 'actions' => [
        //                     'Finish' => Actions::run('Finish'),
        //                 ],
        //                 'current_status' => $this->canEditCurrentStatus(false, true, true)
        //             ],
        //             default => $this->cantDoAnything()
        //         };
        //     }
        // }

        // // checking sales employee
        if ($this->checkPrivileges('Sales', ['Employee'])) {
            $statuses = ['Submitted', 'Approved', 'Refused', 'Forwarded', 'Finished'];
            if ($this->checkCurrentStatus($statuses)) {
                return match ($status) {
                    'Submitted', 'Approved' => [
                        'actions' => [
                            'Cancel' => Actions::run('Cancel'),
                            'Edit'  => Actions::run('Edit'),
                            // 'Revise'  => Actions::run('Revise')
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Refused' => [
                        'actions' => [
                            'Resubmit' => Actions::run('Resubmit'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Forwarded' => [
                        'actions' => [
                            'Clarify' => Actions::run('Clarify'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Finished' => [
                        'actions' => [
                            'Return' => Actions::run('Return'),
                            // 'Close' => Actions::run('Close'),
                            'Revise'  => Actions::run('Revise')


                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    default => $this->cantDoAnything()
                };
            }
        }

        // checking sales branch supervisor
        if ($this->checkPrivileges('Sales', ['Supervisor'])) {
            $statuses = ['Submitted', 'Approved', 'Refused', 'Forwarded', 'Finished'];
            if ($this->checkCurrentStatus($statuses)) {
                return match ($status) {
                    'Submitted' => [
                        'actions' => [
                            'Approve' => Actions::run('Approve'),
                            'Refuse' => Actions::run('Refuse'),
                            'Edit'  => Actions::run('Edit')
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Approved' => [
                        'actions' => [
                            'Cancel' => Actions::run('Cancel'),
                            'Edit'  => Actions::run('Edit')
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Refused' => [
                        'actions' => [
                            'Resubmit' => Actions::run('Resubmit'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Forwarded' => [
                        'actions' => [
                            'Clarify' => Actions::run('Clarify'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Finished' => [
                        'actions' => [
                            'Return' => Actions::run('Return'),
                            // 'Close' => Actions::run('Close'), ////// Will be removed
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    default => $this->cantDoAnything()
                };
            }
        }

        // checking sales managers and supervisors
        if ($this->checkPrivileges('Sales', ['Manager', 'General Supervisor'])) {
            $statuses = ['Submitted', 'Refused', 'Finished'];
            if ($this->checkCurrentStatus($statuses)) {
                return match ($status) {
                    'Submitted' => [
                        'actions' => [
                            'Approve' => Actions::run('Approve'),
                            'Refuse' => Actions::run('Refuse'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Refused' => [
                        'actions' => [
                            'Resubmit' => Actions::run('Resubmit'),
                            'Cancel' => Actions::run('Cancel'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Finished' => [
                        'actions' => [
                            'Close' => Actions::run('Close'),
                            'Revise'  => Actions::run('Revise')
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    default => $this->cantDoAnything()
                };
            }
        }

        // checking Technical Office managers
        if ($this->checkPrivileges('Technical Office', ['Manager', 'General Supervisor', 'Supervisor'])) {
            $statuses = ['Approved', 'Accepted', 'Clarified', 'Returned', 'Assigned', 'Ended'];
            if ($this->checkCurrentStatus($statuses)) {
                return match ($status) {
                    'Approved', 'Assigned' => [
                        'actions' => [
                            'Assign' => Actions::run('Assign'),
                            'Refuse' => Actions::run('Refuse'),
                            'Accept' => Actions::run('Accept'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, true, true)
                    ],
                    'Accepted', 'Clarified', 'Returned' => [
                        'actions' => [
                            'Finish' => Actions::run('Finish'),
                            'Refuse' => Actions::run('Refuse'),
                            'Forward' => Actions::run('Forward'),
                            'Assign' => Actions::run('Assign'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, true, true)
                    ],
                    'Ended' => [
                        'actions' => [
                            'Finish' => Actions::run('Finish'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, true, true)
                    ],
                    default => $this->cantDoAnything()
                };
            }
        }

        // checking Technical Office Employee
        if ($this->checkPrivileges('Technical Office', ['Employee'])) {
            $statuses = ['Accepted', 'Clarified', 'Returned', 'Assigned', 'Forwarded'];
            if ($this->checkCurrentStatus($statuses)) {
                return match ($status) {
                    'Assigned' => [
                        'actions' => [
                            'Refuse' => Actions::run('Refuse'),
                            'Accept' => Actions::run('Accept'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Accepted', 'Clarified', 'Returned' => [
                        'actions' => [
                            'Refuse' => Actions::run('Refuse'),
                            'End' => Actions::run('End'),
                            'Forward' => Actions::run('Forward'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    'Forwarded' => [
                        'actions' => [
                            'Refuse' => Actions::run('Refuse'),
                            'End' => Actions::run('End'),
                        ],
                        'current_status' => $this->canEditCurrentStatus(false, false, false)
                    ],
                    default => $this->cantDoAnything()
                };
            }
        }

        return $this->cantDoAnything();
    }

    // public function getRequiredActions()
    // {
    //     if (is_null($this->status)) {
    //         return $this->cantDoAnything();
    //     }


    //     if ($this->checkRequiredRole('Employee', 'Sales') || $this->checkRequiredRole('Admin')) {
    //         if ($this->status->status->value == 'Submitted') {
    //             return [
    //                 'actions' => [
    //                     'Cancel' => Actions::run('Cancel'),
    //                     'Edit'  => Actions::run('Edit')
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         } elseif ($this->status->status->value == 'Approved') {
    //             return [
    //                 'actions' => [
    //                     'Cancel' => Actions::run('Cancel'),
    //                     'Edit'  => Actions::run('Edit')
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         } elseif ($this->status->status->value == 'Refused') {
    //             return [
    //                 'actions' => [
    //                     'Resubmit' => Actions::run('Resubmit'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         } elseif ($this->status->status->value == 'Forwarded') {
    //             return [
    //                 'actions' => [
    //                     'Clarify' => Actions::run('Clarify'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         } elseif ($this->status->status->value == 'Finished') {
    //             return [
    //                 'actions' => [
    //                     'Return' => Actions::run('Return'),
    //                     'Close' => Actions::run('Close'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         }
    //         return $this->cantDoAnything();
    //     } elseif (
    //         $this->checkRequiredRole('Manager', 'Sales') ||
    //         $this->checkRequiredRole('General Supervisor', 'Sales') ||
    //         $this->checkRequiredRole('Supervisor', 'Sales') ||
    //         $this->checkRequiredRole('Admin')
    //     ) {
    //         if ($this->status->status->value == 'Submitted') {
    //             return [
    //                 'actions' => [
    //                     'Approve' => Actions::run('Approve'),
    //                     'Refuse' => Actions::run('Refuse'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         } elseif ($this->status->status->value == 'Refused') {
    //             return [
    //                 'actions' => [
    //                     'Resubmit' => Actions::run('Resubmit'),
    //                     'Cancel' => Actions::run('Cancel'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         }
    //         return $this->cantDoAnything();
    //     } elseif ($this->checkRequiredRole('Manager', 'Technical Office') || $this->checkRequiredRole('Admin')) {
    //         if ($this->status->status->value == 'Approved') {
    //             return [
    //                 'actions' => [
    //                     'Assign' => Actions::run('Assign'),
    //                     'Refuse' => Actions::run('Refuse'),
    //                     'Accept' => Actions::run('Accept'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, true, true)
    //             ];
    //         } elseif (in_array($this->status->status->value,  ['Accepted', 'Clarified', 'Returned'])) {
    //             return [
    //                 'actions' => [
    //                     'Finish' => Actions::run('Finish'),
    //                     'Refuse' => Actions::run('Refuse'),
    //                     'Forward' => Actions::run('Forward'),
    //                     'Assign' => Actions::run('Assign'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, true, true)
    //             ];
    //         }
    //         return $this->cantDoAnything();
    //     } elseif ($this->checkRequiredRole('Employee', 'Technical Office') || $this->checkRequiredRole('Admin')) {
    //         if ($this->status->status->value == 'Assigned') {
    //             return [
    //                 'actions' => [
    //                     'Refuse' => Actions::run('Refuse'),
    //                     'Accept' => Actions::run('Accept'),
    //                 ],
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         } elseif ($this->status->status->value == 'Accepted' || $this->status->status->value == 'Clarified' || $this->status->status->value == 'Forwarded' || $this->status->status->value == 'Returned') {
    //             $actions = [
    //                 'Finish' => Actions::run('Finish'),
    //                 'Refuse' => Actions::run('Refuse'),
    //             ];
    //             if ($this->status->status->value != 'Forwarded') {
    //                 $actions['Forward'] = Actions::run('Forward');
    //             }
    //             return [
    //                 'actions' => $actions,
    //                 'current_status' => $this->canEditCurrentStatus(false, false, false)
    //             ];
    //         }
    //         return $this->cantDoAnything();
    //     }
    // }
}
