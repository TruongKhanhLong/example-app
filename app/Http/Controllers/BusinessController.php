<?php
namespace App\Http\Controllers;

use App\Models\Business;
use App\Services\VietQRService;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    protected $vietQRService;

    public function __construct(VietQRService $vietQRService)
    {
        $this->vietQRService = $vietQRService;
    }

    public function fetchAndSaveBusiness(Request $request, $taxCode)
    {
        $data = $this->vietQRService->getBusinessData($taxCode);

        if ($data) {
            Business::updateOrCreate(
                ['tax_code' => $data['taxCode']],
                [
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'representative' => $data['representative'],
                    'email' => $data['email'] ?? null,
                    'phone' => $data['phone'] ?? null,
                ]
            );

            return response()->json(['message' => 'Business data saved successfully'], 200);
        }

        return response()->json(['message' => 'Failed to fetch business data'], 500);
    }
}
