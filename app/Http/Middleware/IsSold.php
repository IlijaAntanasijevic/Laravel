<?php

namespace App\Http\Middleware;

use App\Models\Car;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSold
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $carId = $request->route("car");
        $car = Car::find($carId);
        if($car->is_sold == 1){
            return redirect()->route('404');
        }
        return $next($request);
    }
}
