<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return response()->json(
            $contacts
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
        

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->operator_id = $request->operator_id;
        $contact->message = $request->message;

        $contact->save();
        
        return response()->json([
            "message" => "contact created",
            $contact
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
        if (Contact::where('id', $id)->exists()) {
            $contact = Contact::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($contact, 200);
          } else {
            return response()->json([
              "message" => "Contact not found"
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
        if (Contact::where('id', $id)->exists()) {
            $contact = Contact::find($id);
            $contact->name = is_null($request->name) ? $contact->name : $request->name;
            $contact->email = is_null($request->email) ? $contact->email : $request->email;
            $contact->phone = is_null($request->phone) ? $contact->phone : $request->phone;
            $contact->operator_id = is_null($request->operator_id) ? $contact->operator_id : $request->operator_id;
            $contact->message = is_null($request->message) ? $contact->message : $request->message;

            $contact->save();

            return response()->json([
                "message" => "records updated successfully",
                $contact
            ], 200);
        } else{
            return response()->json([
                "message" => "Contact not found"
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
        if(Contact::where('id', $id)->exists()) {
            $contact = Contact::find($id);
            $contact->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Contact not found"
            ], 404);
          }
    }
}
