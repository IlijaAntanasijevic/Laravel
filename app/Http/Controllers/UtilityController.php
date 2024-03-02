<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class UtilityController extends PrimaryController
{
    public function wishlist(Request $request)
    {
        try {
            $userId = $request->get("userId");
            $carId = $request->get("carId");

            $carExistsInWishlist = WishList::where("user_id", $userId)
                ->where('car_id',$carId)
                ->first();

            if(!$carExistsInWishlist){
                WishList::create([
                    "user_id" => $userId,
                    "car_id" => $carId
                ]);
                return response()->json(["message" => "Car added to wishlist."],201);
            }
            return response()->json(["message" => "Car removed from wishlist."],202);//204

        }catch (Exception $e){
            Log::error($e->getMessage());
            return response()->json([], 500);
        }

    }
    public function wishlist_remove(Request $request)
    {
        try {
            $userId = $request->get("userId");
            $carId = $request->get("carId");
            $carExistsInWishlist = WishList::where("user_id", $userId)
                ->where('car_id',$carId)
                ->first();
            if($carExistsInWishlist){
                $carExistsInWishlist->delete();
                return response()->json(["message" => "Car removed from wishlist."],202);//204
            }
            return response()->json(["message" => "Car not found in wishlist."],404);
        }
        catch (Exception $e){
            Log::error($e->getMessage());
            return response()->json([], 500);
        }

    }

    public function compareCar()
    {

    }
}
