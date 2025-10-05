<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Governorate;

class CountryRepository
{
    public function getCountries()
    {
        return Country::select('id', 'name', 'phone_code','is_active','flag_code')->get();
    }

    public function getCountryById($countryId)
    {
        return Country::find($countryId);
    }

    public function changeCountryStatus(Country $country)
    {
        $country->update(["is_active" => $country->is_active === "active" ? "inactive": "active"]);

        return $country;
    }

    public function getGovernorates($countryId)
    {
        return Governorate::select('id', 'name')->where('country_id', $countryId)->get();
    }
}
