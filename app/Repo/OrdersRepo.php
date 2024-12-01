<?php

namespace App\Repo;

use App\Models\Order;
use App\Models\User;
use App\Enum\DepartmentEnum;
use App\Enum\RoleEnum;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;


class OrdersRepo
{
    public static function getMyOrders()
    {
        // static::init();
        $user = Auth::user();
        return static::getUserOrders($user->id);
    }

    public static function getUserOrders(int $user_id)
    {
        // static::init();
        $user = User::find($user_id);
        $role = $user->role->value;
        $department = $user->department->value;


        if ($role == "Admin") {
            $output = Order::with('project')->get();
        } elseif ($role == "Manager" || $role == "General Supervisor") {
            $output = Order::with('project')->get();
        } elseif ($role == "Supervisor") {
            if (is_null($user->branch)) {
                $output = Order::with('project')->get();
            } else {
                $output = Order::with('project')->get()->filter(function ($order) use ($user) {
                    if ($order->user->branch == $user->branch) {
                        return $order;
                    }
                });
            }
        } else {
            if ($department == "Technical Office") {
                $orders = Order::with('project')->get();
                $output = $orders->filter(function ($order) use ($user) {
                    foreach ($order->statuses as $status) {
                        if ($status->checker?->id == $user->id) {
                            return $order;
                        }
                    }
                });
            } else {
                $output = $user->orders;
            }
        }
        return $output->sortByDesc(function ($order) {
            return $order->status->created_at;
        });
    }
    private static function filterOrdersByStatus($orders, array $statuses)
    {
        return $orders->filter(function ($order) use ($statuses) {
            if (in_array($order->status->status->value, $statuses)) {
                return $order;
            }
        });
    }

    public static function getTitlesList(): array
    {
        return [
            'Calculations' => 'Calculations',
            'POQ' => 'Bill of Quantity',
            'Quotation' => 'Quotation',
            'DuctTakeOff' => 'Duct Take-off',
            'TechnicalSubmital' => 'Technical Submittal',
            'Prequalification' => 'Prequalification',
            'ComplianceStatement' => 'Compliance Statement',
            'NoiseStudy' => 'Noise Study',
            'ConsaltanceComments' => 'Consaltance Comments',
            'Letters' => 'Letters',
            'SpecsAnalysis' => 'Specs Analysis',
            'Other' => 'Other',
        ];
    }

    public static function getTitle(string $title = null): mixed
    {
        // static::init();
        return self::getTitlesList()[$title] ?? 'Other';
    }
}