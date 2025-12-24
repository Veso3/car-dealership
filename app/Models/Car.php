<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'price',
        'mileage',
        'fuel_type',
        'transmission',
        'engine_size',
        'power_hp',
        'body_type',
        'color',
        'doors',
        'seats',
        'first_registration',
        'condition',
        'vin',
        'description',
        'location',
        'contact_phone',
        'contact_email',
        'is_featured',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'engine_size' => 'decimal:2',
        'first_registration' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'year' => 'integer',
        'mileage' => 'integer',
        'power_hp' => 'integer',
        'doors' => 'integer',
        'seats' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class)->orderBy('order');
    }

    public function primaryImage(): HasMany
    {
        return $this->hasMany(CarImage::class)->where('is_primary', true);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(CarFeature::class, 'car_car_feature');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', '.') . ' €';
    }

    public function getFormattedMileageAttribute(): string
    {
        return number_format($this->mileage, 0, ',', '.') . ' km';
    }

    /**
     * Get the German translation of the fuel type
     */
    public function getGermanFuelTypeAttribute(): string
    {
        $translations = [
            'petrol' => 'Benzin',
            'diesel' => 'Diesel',
            'electric' => 'Elektrisch',
            'hybrid' => 'Hybrid',
            'plug-in_hybrid' => 'Plug-in Hybrid',
            'lpg' => 'LPG',
            'cng' => 'CNG',
        ];

        return $translations[$this->fuel_type] ?? ucfirst($this->fuel_type);
    }

    /**
     * Get the German translation of the transmission
     */
    public function getGermanTransmissionAttribute(): string
    {
        $translations = [
            'manual' => 'Manuell',
            'automatic' => 'Automatik',
            'semi_automatic' => 'Halbautomatik',
        ];

        return $translations[$this->transmission] ?? ucfirst(str_replace('_', ' ', $this->transmission));
    }

    /**
     * Get the German translation of the body type
     */
    public function getGermanBodyTypeAttribute(): string
    {
        $translations = [
            'sedan' => 'Limousine',
            'suv' => 'SUV',
            'coupe' => 'Coupé',
            'convertible' => 'Cabrio',
            'wagon' => 'Kombi',
            'hatchback' => 'Kombi',
            'van' => 'Van',
            'pickup' => 'Pickup',
            'other' => 'Sonstiges',
        ];

        return $translations[$this->body_type] ?? ucfirst($this->body_type);
    }
}
