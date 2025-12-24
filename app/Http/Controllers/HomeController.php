<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::with(['images', 'features'])->active();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('make', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filters
        if ($request->has('make') && $request->make) {
            $query->where('make', $request->make);
        }

        if ($request->has('fuel_type') && $request->fuel_type) {
            $query->where('fuel_type', $request->fuel_type);
        }

        if ($request->has('transmission') && $request->transmission) {
            $query->where('transmission', $request->transmission);
        }

        if ($request->has('body_type') && $request->body_type) {
            $query->where('body_type', $request->body_type);
        }

        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('min_year') && $request->min_year) {
            $query->where('year', '>=', $request->min_year);
        }

        if ($request->has('max_year') && $request->max_year) {
            $query->where('year', '<=', $request->max_year);
        }

        // Sorting - Featured cars always come first (sorted by most recent), then non-featured cars
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        // Always prioritize featured cars first
        $query->orderBy('is_featured', 'desc');
        
        // Featured cars: always sorted by most recent (created_at DESC)
        // Non-featured cars: sorted by user's preference
        if (in_array($sortBy, ['price', 'year', 'mileage', 'created_at'])) {
            // Use conditional sorting: featured cars by created_at DESC, non-featured by user preference
            $query->orderByRaw("CASE WHEN is_featured = 1 THEN created_at END DESC")
                  ->orderByRaw("CASE WHEN is_featured = 0 THEN {$sortBy} END " . strtoupper($sortOrder));
        } else {
            // Default: both featured and non-featured by created_at DESC
            $query->orderBy('created_at', 'desc');
        }

        $cars = $query->paginate(12);
        $makes = Car::active()->distinct()->pluck('make')->sort()->values();
        $features = CarFeature::all();

        return view('home', compact('cars', 'makes', 'features'));
    }

    public function show(Car $car)
    {
        $car->load(['images', 'features', 'user']);
        
        // Get related cars (same make, different model)
        $relatedCars = Car::where('make', $car->make)
            ->where('id', '!=', $car->id)
            ->active()
            ->with('images')
            ->limit(4)
            ->get();

        return view('cars.show', compact('car', 'relatedCars'));
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }
}
