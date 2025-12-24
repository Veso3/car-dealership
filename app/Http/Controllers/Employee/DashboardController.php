<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalCars = Car::where('user_id', $user->id)->count();
        $activeCars = Car::where('user_id', $user->id)->where('is_active', true)->count();
        $featuredCars = Car::where('user_id', $user->id)->where('is_featured', true)->count();
        
        $recentCars = Car::where('user_id', $user->id)
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('employee.dashboard', compact('totalCars', 'activeCars', 'featuredCars', 'recentCars'));
    }
}
