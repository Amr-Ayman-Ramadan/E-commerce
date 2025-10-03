<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    public function getCountries()
    {
        return Country::select('id', 'name', 'phone_code','is_active')->get();
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
}
