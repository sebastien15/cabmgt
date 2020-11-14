<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
 
        return response()->json(
            $cars
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car;
 
        $car->name = $request->name;
        $car->description = $request->description;
        $car->image = $request->image;
        $car->seates = $request->seates;
        $car->luggage_place = $request->luggage_place;
        $car->status = $request->status;
        $car->operator_id = $request->operator_id;
        $car->custom_price_per_km = $request->custom_price_per_km;
 
        $car->save();
        
        return response()->json([
            "message" => "car created",
            $car
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Car::where('id', $id)->exists()) {
            $car = CAR::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($car, 200);
        } else {
            return response()->json([
              "message" => "car not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->name = is_null($request->name) ? $car->name : $request->name;
            $car->description = is_null($request->description) ? $car->description : $request->description;
            $car->status = is_null($request->status) ? $car->status : $request->status;
            $car->image = is_null($request->image) ? $car->image : $request->image;
            $car->seates = is_null($request->seates) ? $car->seates : $request->seates;
            $car->luggage_place = is_null($request->luggage_place) ? $car->luggage_place : $request->luggage_place;
            $car->operator_id = is_null($request->operator_id) ? $car->operator_id : $request->operator_id;
            $car->custom_price_per_km = is_null($request->custom_price_per_km) ? $car->custom_price_per_km : $request->custom_price_per_km;
 
            $car->save();
 
            return response()->json([
                "message" => "records updated successfully",
                $car
            ], 200);
        } else{
            return response()->json([
                "message" => "car not found"
            ], 404);
        };

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
              "message" => "car not found"
            ], 404);
        }

    }
}
