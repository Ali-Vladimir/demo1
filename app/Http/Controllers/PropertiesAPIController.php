<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;

class PropertiesAPIController extends Controller
{
    public function properties(){
        // Logic to retrieve properties from the database and return them as JSON
        $properties = Property::with('city')->with('list_type')->get();
        return response()->json($properties);
    }

    public function saveContact(){
        $valitador = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|max:20|regex:/^[0-9+\-()]+$/',
            'message' => 'required|max:500'
        ]);
        if($valitador->fails()){
            return response()->json($valitador->message()->toArray,400);
        }
        $contact = new ContactAgent();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        $contact->save();

        return response()->json(["message"=>"Contact saved successfully"]);
    }
}
