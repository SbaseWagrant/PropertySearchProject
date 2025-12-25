<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PropertySearchService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request, PropertySearchService $service)
    {
        $filters = $request->only([
            'name',
            'bedrooms',
            'bathrooms',
            'storeys',
            'garages',
            'price_min',
            'price_max',
        ]);

        return response()->json([
            'data' => $service->search($filters),
        ]);
    }
}
