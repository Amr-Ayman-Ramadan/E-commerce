<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\CountryService;

class CountryController extends Controller
{
    protected $countryService;
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $counties = $this->countryService->getCountries();

        return view('dashboard.countries.index', compact('counties'));
    }

    public function changeCountryStatus(Country $country)
    {
        $this->countryService->changeCountryStatus($country);

        return response()->json([
            'success' => true,
            'message' => 'Country status updated successfully!',
            'status' => $country->is_active
        ]);    }
}
