<?php

namespace App\Traits;

trait TSRHelper
{
    function removeEmptyLine(string $text)
    {
        $emptyLine = '"","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""';
        return str_replace($emptyLine, "", $text);
    }

    function removeEmptyValues(string $text)
    {
        $emptyValue = '""';
        return str_replace($emptyValue, "", $text);
    }

    function fixEmpty(string $text, string $emptyNeedle = ",,", string $replace = ",")
    {
        $text = str_replace($emptyNeedle, $replace, $text);
        if (str_contains($text, $emptyNeedle)) {
            return $this->fixEmpty($text);
        } else {
            return $text;
        }
    }

    function fixCsv(string $text)
    {
        $text = $this->removeEmptyLine($text);
        $text = $this->removeEmptyValues($text);
        $text = $this->fixEmpty($text, ",,", ",");
        $text = $this->fixEmpty($text, "\n\r", "");
        $text = $this->fixEmpty($text, " \n" . '"', '"');
        // $text = $this->fixEmpty($text, ',\n', ',');

        return $text;
    }

    function getQutationNumber(string $text)
    {
        // $parts = explode(',"Quotation Number","', $text);
        // $prts = explode('","', $parts[1]);
        // return intval($prts[0]);
        return intval($this->getFieldValue($text, 'Quotation Number'));
    }

    function getFieldValue(string $text, string $fieldTitle)
    {
        $searchFor = ',"' . $fieldTitle . '","';
        $parts = explode($searchFor, $text);
        $prts = explode('","', $parts[1]);
        return $prts[0];
    }

    function getQutation(string $text)
    {
        $parts = explode('"No.","Item No.","Description","Quantity","Total Amount","Remarks",', $text);
        $prts  = explode(',"Net Total Amount Without VAT",', $parts[1]);
        $lines = explode("\n", trim($prts[0]));
        $result = [];

        foreach ($lines as $line) {

            $line = trim($line);

            if (empty($line)) {
                continue;
            }

            $result[] = str_getcsv($line);
        }

        return $this->mapQutation($result);
    }

    function mapQutation(array $qutation)
    {
        $data = [];
        foreach ($qutation as $line) {
            if (isset($line[0]) && intval($line[0]) > 0) {
                if (!isset($data[$line[1]])) {
                    $data[$line[1]] = [];
                }
                $data[$line[1]][] = [
                    'line_number' => $line[0],
                    'product_code' => $line[1],
                    'description' => $line[2],
                    'unit_price' => $this->convertToFloat($line[3]),
                    'quantity' => $this->convertToFloat($line[4]),
                    'total_price' => $this->convertToFloat($line[5]),
                    'remarks' => $line[6],
                ];
            }
        }

        return $data;
    }

    function convertToFloat($text)
    {
        // Remove commas if present in the number (common in large numbers like 1,150.00)
        $text = str_replace(',', '', $text);

        // Convert the cleaned string to a float
        return (float) $text;
    }
}