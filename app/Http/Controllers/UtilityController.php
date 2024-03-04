<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class UtilityController extends PrimaryController
{
    public function wishlist_index()
    {
        $userId = Auth::id();
        $data = Wishlist::where('user_id', $userId)
            ->with('car')
            ->get();
        return view('pages.main.wish-list',['data' => $data]);
    }
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
            //return response()->json(["message" => "Car removed from wishlist."],202);//204
            return response()->json([],500);
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

    public function getModelsById(Request $request)
    {
        $id = $request->get('id');
        $models = CarModel::where('brand_id', $id)->get();
        return response()->json($models);
    }


}
