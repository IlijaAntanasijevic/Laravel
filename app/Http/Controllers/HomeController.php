<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends PrimaryController
{
    public function index(Request $request)
    {
        $perPage = 6;

        $cars = Car::with('model', 'engine', 'user', 'wishlist')->orderByDesc('created_at');

        $brands = Brand::all()->sortBy('name')->reject(function ($brand) {
            return $brand->name === 'Other';
        });

        if ($request->ajax()) {
            $html = '';
            $page = $request->input('page', 1);
            $cars = $cars->skip(($page - 1) * $perPage)
                         ->take($perPage)
                         ->get();
            foreach ($cars as $car) {
                $html .= view('pages.cars.homeCard', ['car' => $car, 'showOverlay' => true])->render();
            }

            return response()->json([
                'html' => $html,
                'hasMore' => $cars->count() == $perPage
            ]);
        }

        $cars = $cars->limit($perPage)->get();
        $bodies = Body::all();

        return view('pages.main.home', compact('cars', 'brands', 'bodies'));
    }

    public function search(Request $request)
    {
        dd($request->all());
    }


}
