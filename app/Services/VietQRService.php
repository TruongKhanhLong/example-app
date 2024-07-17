<?php 
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class VietQRService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getBusinessData($taxCode)
    {
        try {
            $response = $this->client->get("https://api.vietqr.io/v2/business/{$taxCode}");
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Error fetching business data: ' . $e->getMessage());
            return null;
        }
    }
}
