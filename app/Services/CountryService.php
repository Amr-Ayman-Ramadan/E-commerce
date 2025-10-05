<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Governorate;
use App\Repositories\CountryRepository;

class CountryService
{
    protected $countryRepository;
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getCountries()
    {
        $countries = $this->countryRepository->getCountries();

        return $countries ?? abort(404, 'Country not found');
    }

    public function getCountryById($countryId)
    {
        $country = $this->countryRepository->getCountryById($countryId);

        return $country ?? abort(404, 'Country not found');
    }

    public function changeCountryStatus(Country $country)
    {
       $country =  $this->countryRepository->changeCountryStatus($country);

       return $country ?? abort(404, 'Country not found');
    }

    public function getGovernorates($countryId)
    {
        $governorates = $this->countryRepository->getGovernorates($countryId);

        return $governorates ?? abort(404, 'Governorates not found');
    }
}
