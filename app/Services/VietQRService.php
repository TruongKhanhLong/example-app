<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class VietQRService
{
    public function fetchBusinessData($taxCode)
    {
        $response = Http::get("https://api.vietqr.io/v2/business/$taxCode");
        Log::info($response);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
