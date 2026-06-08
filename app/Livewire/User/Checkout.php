<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $provinces = [];
    public $regencies = [];
    public $districts = [];
    public $villages = [];

    public $province = '';
    public $regency = '';
    public $district = '';
    public $villagesCode = '';

    public function mount()
    {
        $response = Http::get('https://wilayah.id/api/provinces.json');
        $this->provinces = $response->json()['data'] ?? [];
    }

    public function updatedProvince($province_code)
    {
        $this->reset(['regency', 'district', 'villagesCode', 'districts', 'villages']);

        if (!$province_code){
            $this->regencies =[];
            return;
        }

        $response = Http::get(
            "https://wilayah.id/api/regencies/{$province_code}.json"
        );

        $this->regencies = $response->json()['data'] ?? [];
    }

    public function updatedRegency($regency_code)
    {
        $this->reset([
            'district',
            'villagesCode',
            'villages',
        ]);

        if (!$regency_code) {
            $this->districts = [];
            return;
        }

        $response = Http::get(
            "https://wilayah.id/api/districts/{$regency_code}.json"
        );

        $this->districts = $response->json()['data'] ?? [];
    }

    public function updatedDistrict($district_code)
    {
        $this->reset([
            'villagesCode',
        ]);

        if (!$district_code) {
            $this->villages = [];
            return;
        }

        $response = Http::get(
            "https://wilayah.id/api/villages/{$district_code}.json"
        );

        $this->villages = $response->json()['data'] ?? [];
    }

    public function render()
    {
        return view('livewire.user.checkout');
    }
}
