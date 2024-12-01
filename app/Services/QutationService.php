<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Qutation;
use App\Models\QutationItem;
use App\Models\Workorder;

class QutationService
{
    public static function splitItemQuantity(QutationItem $item, float $quantity): QutationItem
    {
        if ($quantity < $item->quantity) {
            $remainQuantity = $item->quantity - $quantity;
            $remainPrice = $remainQuantity * $item->unit_price;
            $newItem = $item->toArray();
            unset($newItem['id']);
            unset($newItem['created_at']);
            unset($newItem['updated_at']);
            unset($newItem['workorder_id']);
            unset($newItem['deleted_at']);
            $newItem['quantity'] = $quantity;
            $newItem['total_price'] = $quantity * $item->unit_price;
            $item->update(['quantity' => $remainQuantity, 'total_price' => $remainPrice]);
            $item = QutationItem::create($newItem);
        }
        return $item;
    }
}
