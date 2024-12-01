<?php

namespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Illuminate\Support\Facades\Storage;

trait ExcelFile
{
    function createSpreadSheet(string $filePath)
    {
        $fullFilePath = storage_path('app/public/' . $filePath);
        return IOFactory::load($fullFilePath);
    }

    function createWriter($spreadsheet)
    {
        $writer = new Csv($spreadsheet);
        $writer->setSheetIndex(0);
        return $writer;
    }

    function getCSVContent($writer, string $csvPath)
    {
        $fullCSVPath = storage_path('app/private/' . $csvPath);
        Storage::put($csvPath, '');
        $writer->save($fullCSVPath);
        return Storage::get($csvPath);
    }

    function excelToCSV(string $filePath, string $csvPath = null)
    {
        $csvFilePath = $csvPath ?? $filePath . '.csv';
        $spreadsheet = $this->createSpreadSheet($filePath);
        $writer = $this->createWriter($spreadsheet);
        $content = $this->getCSVContent($writer, $csvFilePath);
        return $content;
    }
}