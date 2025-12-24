<?php

namespace Database\Seeders;

use App\Models\CarFeature;
use Illuminate\Database\Seeder;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'Air Conditioning',
            'Navigation System',
            'Parking Sensors',
            'Rear View Camera',
            'Bluetooth',
            'USB Port',
            'Leather Seats',
            'Sunroof',
            'Alloy Wheels',
            'Fog Lights',
            'Cruise Control',
            'Keyless Entry',
            'Start/Stop System',
            'Electric Windows',
            'Central Locking',
            'ABS',
            'ESP',
            'Airbags',
            'Isofix',
            'Traction Control',
            'Hill Start Assist',
            'Lane Assist',
            'Blind Spot Monitor',
            'Adaptive Cruise Control',
            'Heated Seats',
            'Electric Mirrors',
            'Xenon Lights',
            'LED Lights',
            'Tinted Windows',
            'Roof Rails',
            'Tow Bar',
            'Spare Wheel',
            'Run Flat Tyres',
            'Premium Sound System',
            'Apple CarPlay',
            'Android Auto',
            'Wireless Charging',
            'Panoramic Roof',
            'Electric Tailgate',
            '360° Camera',
        ];

        foreach ($features as $feature) {
            CarFeature::firstOrCreate(['name' => $feature]);
        }
    }
}
