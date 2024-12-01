<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Workorder;
use Illuminate\Support\Facades\Auth;

class SerialNumberService
{
    private static $userCodeDigits = 3;
    private static $counterDigits = 2;
    private static $dateCodeFormat = "ym";
    private static $yearDigits = 2;
    private static $reviseCodeDigits = 1;

    private static $padingChar = '0';

    public static function orderSeialNumberGenerate(): string
    {
        $counterNumberPart = str_pad(static::$padingChar, static::$counterDigits, static::$padingChar, STR_PAD_LEFT);
        $reviseNumberPart = str_pad(static::$padingChar, static::$reviseCodeDigits, static::$padingChar, STR_PAD_LEFT);
        $startNumberPart = $counterNumberPart . $reviseNumberPart;
        $currentYear = (int) date('y');
        $userCode = (int) Auth::user()->code;
        $baseCode = static::calculateOrderSerialNumberBase($currentYear, $userCode);
        $lastUserOrder = Order::withTrashed()->where('serial_number', 'like', $baseCode . '%')->latest('serial_number')->first();
        $lastSerialNumber = $lastUserOrder ? $lastUserOrder->serial_number : $baseCode . $startNumberPart;
        $numberPart = intval(substr($lastSerialNumber, strlen($baseCode))) + 1;
        $newNumberPart = str_pad($numberPart, static::$counterDigits + static::$reviseCodeDigits, static::$padingChar, STR_PAD_LEFT);
        return $baseCode . $newNumberPart . $reviseNumberPart;
    }

    private static function calculateOrderSerialNumberBase(int $year, int $user): string
    {
        $yearCode = str_pad($year, static::$yearDigits, static::$padingChar, STR_PAD_LEFT); // Ensure year is 4 digits
        $userCode = str_pad($user, static::$userCodeDigits, static::$padingChar, STR_PAD_LEFT); // Ensure user code is 4 digits
        return $userCode . $yearCode;
    }

    private static function getSerialNumberBase()
    {
        $userCode = Auth::user()->code;
        $datePart = date(static::$dateCodeFormat);
        $userPart = str_pad($userCode, static::$userCodeDigits, static::$padingChar, STR_PAD_LEFT);
        return $userPart . $datePart;
    }

    private static function getSerialNumberReviseBase(string $serialNumber)
    {
        return substr($serialNumber, 0, strlen($serialNumber) - static::$reviseCodeDigits);
    }

    public static function generateSerialNumber(string $serialNumber = null)
    {
        if (is_null($serialNumber)) {
            $baseCode = static::getSerialNumberBase();
            $latestOrder = Order::withTrashed()->where('serial_number', 'like', $baseCode . '%')->latest('serial_number')->first();
            $counter = static::getCounterFromSerialNumber($latestOrder?->serial_number);
            return static::incrementAndGenerate($baseCode, $counter, false);
        } else {
            $baseCode = static::getSerialNumberReviseBase($serialNumber);
            $counter = static::getReviseCounterFromSerialNumber($serialNumber);
            return static::incrementAndGenerate($baseCode, $counter, true);
        }
    }

    public static function generateWorkorderNumber()
    {
        $prefix = 'Wo';
        $baseCode = static::getSerialNumberBase();
        $latestOrder = Workorder::withTrashed()->where('workorder_number', 'like', $prefix . $baseCode . '%')->latest('workorder_number')->first();
        // dd($latestOrder);
        $woNoumber = isset($latestOrder->workorder_number) ? str_replace($prefix,  '', $latestOrder->workorder_number) : null;
        $counter = static::getCounterFromSerialNumber($woNoumber);
        // dd($counter);
        return static::incrementAndGenerate($baseCode, $counter, false);
    }

    private static function incrementAndGenerate(string $baseCode, int $counter = 0, bool $forRevise = false)
    {
        $newCounter  = intval($counter) + 1;
        // dd($newCounter);
        if ($forRevise) {
            $counterPart = str_pad($newCounter, static::$reviseCodeDigits, static::$padingChar, STR_PAD_LEFT);
            return $baseCode . $counterPart;
        } else {
            $counterPart = str_pad($newCounter, static::$counterDigits, static::$padingChar, STR_PAD_LEFT);
            $revisePart  = str_pad(static::$padingChar, static::$reviseCodeDigits, static::$padingChar, STR_PAD_LEFT);
            return $baseCode . $counterPart . $revisePart;
        }
    }

    private static function incrementAndGenerateSerialNumberRevise(string $serialNumber, int $counter = 0)
    {
        $newCounter  = $counter + 1;
        $basePart    = static::getSerialNumberBase();
        $counterPart = str_pad($newCounter, static::$counterDigits, static::$padingChar, STR_PAD_LEFT);
        $revisePart  = str_pad(static::$padingChar, static::$reviseCodeDigits, static::$padingChar, STR_PAD_LEFT);
        return $basePart . $counterPart . $revisePart;
    }

    private static function getCounterFromSerialNumber(string $serialNumber = null)
    {
        if (is_null($serialNumber)) {
            return 0;
        }
        $baseCode = static::getSerialNumberBase();
        $counterPart = substr($serialNumber, strlen($baseCode), static::$counterDigits);
        // dd($serialNumber, $baseCode, $counterPart);
        return intval($counterPart);
    }

    private static function getReviseCounterFromSerialNumber(string $serialNumber = null)
    {
        if (is_null($serialNumber)) {
            return 0;
        }
        $baseCode = static::getSerialNumberBase();
        $counterPart = substr($serialNumber, strlen($baseCode) + static::$reviseCodeDigits, static::$reviseCodeDigits);
        return intval($counterPart);
    }
}
