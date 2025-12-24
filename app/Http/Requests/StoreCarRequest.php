<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid,plug-in_hybrid,lpg,cng',
            'transmission' => 'required|in:manual,automatic,semi_automatic',
            'engine_size' => 'nullable|numeric|min:0|max:20',
            'power_hp' => 'nullable|integer|min:0',
            'body_type' => 'required|in:sedan,suv,coupe,convertible,wagon,hatchback,van,pickup,other',
            'color' => 'nullable|string|max:255',
            'doors' => 'nullable|integer|min:2|max:6',
            'seats' => 'nullable|integer|min:2|max:9',
            'first_registration' => 'nullable|date',
            'condition' => 'required|in:new,used,demo',
            'vin' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'features' => 'nullable|array',
            'features.*' => 'exists:car_features,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
}
