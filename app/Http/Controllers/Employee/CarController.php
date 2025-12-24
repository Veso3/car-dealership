<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\CarFeature;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::where('user_id', Auth::id())
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('employee.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = CarFeature::orderBy('name')->get();
        return view('employee.cars.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        
        $car = Car::create($data);

        // Attach features
        if ($request->has('features')) {
            $car->features()->sync($request->features);
        }

        // Handle images
        if ($request->hasFile('images')) {
            $this->uploadImages($car, $request->file('images'));
        }

        return redirect()->route('employee.cars.index')
            ->with('success', 'Car listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $this->authorize('view', $car);
        $car->load(['images', 'features', 'user']);
        return view('employee.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $this->authorize('update', $car);
        $car->load('features');
        $features = CarFeature::orderBy('name')->get();
        return view('employee.cars.edit', compact('car', 'features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $this->authorize('update', $car);
        
        $data = $request->validated();
        $car->update($data);

        // Sync features
        if ($request->has('features')) {
            $car->features()->sync($request->features);
        } else {
            $car->features()->detach();
        }

        // Handle new images
        if ($request->hasFile('images')) {
            $this->uploadImages($car, $request->file('images'));
        }

        return redirect()->route('employee.cars.index')
            ->with('success', 'Car listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        
        // Delete images
        foreach ($car->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $car->delete();

        return redirect()->route('employee.cars.index')
            ->with('success', 'Car listing deleted successfully.');
    }

    /**
     * Upload images for a car
     */
    public function uploadImage(Request $request, Car $car)
    {
        $this->authorize('update', $car);
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_primary' => 'boolean',
        ]);

        $imagePath = $request->file('image')->store('cars', 'public');
        
        $order = $car->images()->max('order') + 1;
        
        $carImage = CarImage::create([
            'car_id' => $car->id,
            'image_path' => $imagePath,
            'is_primary' => $request->boolean('is_primary', false),
            'order' => $order,
        ]);

        // If this is set as primary, unset others
        if ($carImage->is_primary) {
            CarImage::where('car_id', $car->id)
                ->where('id', '!=', $carImage->id)
                ->update(['is_primary' => false]);
        }

        return response()->json([
            'success' => true,
            'image' => $carImage,
            'url' => $carImage->url,
        ]);
    }

    /**
     * Delete an image
     */
    public function deleteImage(CarImage $image)
    {
        $this->authorize('update', $image->car);
        
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Helper method to upload multiple images
     */
    private function uploadImages(Car $car, array $images)
    {
        $order = $car->images()->max('order') ?? 0;
        $isFirst = $car->images()->count() === 0;

        foreach ($images as $image) {
            $order++;
            $imagePath = $image->store('cars', 'public');
            
            CarImage::create([
                'car_id' => $car->id,
                'image_path' => $imagePath,
                'is_primary' => $isFirst,
                'order' => $order,
            ]);
            
            $isFirst = false;
        }
    }
}
