<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class routeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::all();
 
        return response()->json(
            $routes
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = new Route;
 
        $route->from = $request->from;
        $route->to = $request->to;
        $route->from_post_code = $request->from_post_code;
        $route->to_post_code = $request->to_post_code;
        $route->price = $request->price;
        $route->kilometers = $request->kilometers;
        $route->time = $request->time;
 
        $route->save();
        
        return response()->json([
            "message" => "route created",
            $route
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
        if (Route::where('id', $id)->exists()) {
            $route = Route::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($route, 200);
          } else {
            return response()->json([
              "message" => "route not found"
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
        if (Route::where('id', $id)->exists()) {
            $route = Route::find($id);
            $route->from = is_null($request->from) ? $route->from : $request->from;
            $route->to = is_null($request->to) ? $route->to : $request->to;
            $route->from_post_code = is_null($request->from_post_code) ? $route->from_post_code : $request->from_post_code;
            $route->to_post_code = is_null($request->to_post_code) ? $route->to_post_code : $request->to_post_code;
            $route->price = is_null($request->price) ? $route->price : $request->price;
            $route->kilometers = is_null($request->kilometers) ? $route->kilometers : $request->kilometers;
            $route->time = is_null($request->time) ? $route->time : $request->time;
 
            $route->save();
 
            return response()->json([
                "message" => "records updated successfully",
                $route
            ], 200);
        } else{
            return response()->json([
                "message" => "route not found"
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
        if(Route::where('id', $id)->exists()) {
            $route = Route::find($id);
            $route->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Route not found"
            ], 404);
          }

    }
}
