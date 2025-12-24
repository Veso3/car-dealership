<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarFeature extends Model
{
    protected $fillable = [
        'name',
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'car_car_feature');
    }

    /**
     * Get the German translation of the feature name
     */
    public function getGermanNameAttribute(): string
    {
        $translations = [
            '360° Camera' => '360° Kamera',
            'ABS' => 'ABS',
            'Adaptive Cruise Control' => 'Adaptive Geschwindigkeitsregelung',
            'Air Conditioning' => 'Klimaanlage',
            'Airbags' => 'Airbags',
            'Alloy Wheels' => 'Leichtmetallfelgen',
            'Android Auto' => 'Android Auto',
            'Apple CarPlay' => 'Apple CarPlay',
            'Blind Spot Monitor' => 'Toter-Winkel-Assistent',
            'Bluetooth' => 'Bluetooth',
            'Central Locking' => 'Zentralverriegelung',
            'Cruise Control' => 'Tempomat',
            'Electric Mirrors' => 'Elektrische Spiegel',
            'Electric Tailgate' => 'Elektrische Heckklappe',
            'Electric Windows' => 'Elektrische Fensterheber',
            'ESP' => 'ESP',
            'Fog Lights' => 'Nebelscheinwerfer',
            'Heated Seats' => 'Sitzheizung',
            'Hill Start Assist' => 'Berg-Anfahr-Assistent',
            'Isofix' => 'Isofix',
            'Keyless Entry' => 'Keyless Go',
            'Lane Assist' => 'Spurhalte-Assistent',
            'Leather Seats' => 'Ledersitze',
            'LED Lights' => 'LED-Scheinwerfer',
            'Navigation System' => 'Navigationssystem',
            'Panoramic Roof' => 'Panoramadach',
            'Parking Sensors' => 'Einparkhilfe',
            'Premium Sound System' => 'Premium Soundsystem',
            'Rear View Camera' => 'Rückfahrkamera',
            'Roof Rails' => 'Dachreling',
            'Run Flat Tyres' => 'Run-Flat-Reifen',
            'Spare Wheel' => 'Reserverad',
            'Start/Stop System' => 'Start-Stopp-System',
            'Sunroof' => 'Schiebedach',
            'Tinted Windows' => 'Getönte Scheiben',
            'Tow Bar' => 'Anhängerkupplung',
            'Traction Control' => 'Traktionskontrolle',
            'USB Port' => 'USB-Anschluss',
            'Wireless Charging' => 'Kabelloses Laden',
            'Xenon Lights' => 'Xenon-Scheinwerfer',
        ];

        return $translations[$this->name] ?? $this->name;
    }
}
