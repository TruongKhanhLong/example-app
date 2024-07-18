<?php
namespace App\Http\Controllers;

use App\Services\VietQRService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class BusinessController extends Controller
{
    protected $vietQRService;

    public function __construct(VietQRService $vietQRService)
    {
        $this->vietQRService = $vietQRService;
    }

    public function fetchBusiness($taxCode)
    {
        Log::info(123);
        $businessData = $this->vietQRService->fetchBusinessData($taxCode);

        if ($businessData) {
            return response()->json($businessData);
        } else {
            return response()->json(['message' => 'Business data could not be fetched'], 404);
        }
    }
}

