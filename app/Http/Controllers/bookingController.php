<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
 
        return response()->json(
            $bookings
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
        $booking = new Booking;
 
        $booking->user_id          = $request->user_id;
        $booking->route_id         = $request->route_id;
        $booking->car_id           = $request->car_id;
        $booking->seat_no          = $request->seat_no;
        $booking->payed            = $request->payed;
        $booking->approved         = $request->approved;
        $booking->nbr_people       = $request->nbr_people;
        $booking->nbr_luggage      = $request->nbr_luggage;
        $booking->pickup_date      = $request->pickup_date;
        $booking->pickup_time      = $request->pickup_time;
        $booking->pickup_full_add  = $request->pickup_full_add;
        $booking->dropoff_full_add = $request->dropoff_full_add;
        $booking->custom_message   = $request->custom_message;
 
        $booking->save();
        
        return response()->json([
            "message" => "booking created",
            $booking
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
        if (Booking::where('id', $id)->exists()) {
            $booking = Booking::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($booking, 200);
        } else {
            return response()->json([
              "message" => "booking not found"
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
        if (Booking::where('id', $id)->exists()) {

            $booking                   = Booking::find($id);

            $booking->user_id          = is_null($request->user_id) ? $booking->user_id : $request->user_id;
            $booking->route_id         = is_null($request->route_id) ? $booking->route_id : $request->route_id;
            $booking->car_id           = is_null($request->car_id) ? $booking->car_id : $request->car_id;
            $booking->seat_no          = is_null($request->seat_no) ? $booking->seat_no : $request->seat_no;
            $booking->payed            = is_null($request->payed) ? $booking->payed : $request->payed;
            $booking->approved         = is_null($request->approved) ? $booking->approved : $request->approved;
            $booking->nbr_people       = is_null($request->nbr_people) ? $booking->nbr_people : $request->nbr_people;
            $booking->nbr_luggage      = is_null($request->nbr_luggage) ? $booking->nbr_luggage : $request->nbr_luggage;
            $booking->pickup_date      = is_null($request->pickup_date) ? $booking->pickup_date : $request->pickup_date;
            $booking->pickup_time      = is_null($request->pickup_time) ? $booking->pickup_time : $request->pickup_time;
            $booking->pickup_full_add  = is_null($request->pickup_full_add) ? $booking->pickup_full_add : $request->pickup_full_add;
            $booking->dropoff_full_add = is_null($request->dropoff_full_add) ? $booking->dropoff_full_add : $request->dropoff_full_add;
            $booking->custom_message   = is_null($request->custom_message) ? $booking->custom_message : $request->custom_message;
 
            $booking->save();
 
            return response()->json([
                "message" => "bookings updated successfully",
                $booking
            ], 200);
        } else{
            return response()->json([
                "message" => "booking not found"
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
        if(Booking::where('id', $id)->exists()) {
            $booking = Booking::find($id);
            $booking->delete();
    
            return response()->json([
              "message" => "booking deleted"
            ], 202);
        } else {
            return response()->json([
              "message" => "booking not found"
            ], 404);
        }

    }
}
