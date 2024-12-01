<?php

namespace App\Services;

class AIServices
{
    private $appKey = '09c8c09c82764e73a906a8f353115bec';
    private $endPoint = 'https://api.aimlapi.com/v1';
    private $appModel = 'GPT-4';

    private function transformDescription($description)
    {
        // $url = $this->endPoint . '/transform';
        $url = $this->endPoint;
        $data = json_encode(['text' => $description, 'model' => $this->appModel]);

        $headers = [
            "Authorization: Bearer {$this->appKey}",
            "Content-Type: application/json",
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        // Log the raw response for debugging
        \Log::info('AIMLAPI Response: ' . $response);

        $responseData = json_decode($response, true);

        // Check for API errors or responses
        if (isset($responseData['error'])) {
            return 'API Error: ' . $responseData['error']['message'];
        }

        return $responseData['result'] ?? null;
    }

    public function convertDescription(string $text)
    {
        return $this->transformDescription($text);
    }
}
