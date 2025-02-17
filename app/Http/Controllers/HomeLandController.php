<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyListingType;
use App\Models\ContactAgent;

class HomeLandController extends Controller
{
    public function index(){

        $properties =Property::all();
        return view('homeland.index', compact('properties'));
    }
    public function property_details(Request $request, $property_id){
        if($request->isMethod("POST")){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'phone' => 'required|max:20|regex:/^[0-9+\-() ]+$/',
                'message' => 'required|string|max:1000',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'phone.regex' => 'The phone number format is invalid.',
                'message.required' => 'The message field is required.',

            ]);
            $contact = new ContactAgent();
            $contact->name = $request->input("name");
            $contact->email = $request->input("email");
            $contact->phone = $request->input("phone");
            $contact->message = $request->input("message");
            $contact->save();
            session()->now("success","Your message has been sent successfully");
        }
        $property = Property::find($property_id);
        //$property = PropertyListingType::find($property_id->property_listing_type_id);
        //dd($propertyType);
        return view('homeland.property_details', compact('property'));
    }

    public function contact(){
        return view('homeland.contact');
    }

    public function buy(){
        $properties = Property::where("offer_type","For Sale");
        return view('homeland.buy')->get();
    }

    public function rent(){
        $properties = Property::where("offer_type","For Sale");
        return view('homeland.rent')->get();
    }
    public function properties_listing_type($properties_listing_type){
        //$properties = Property::where("property_listing_type_id", $listing_type_id)
        $properties = PropertyListingType::find($properties_listing_type)->properties;
        //dd($properties);
        return view('homeland.index', compact('properties'));
    }

    public function about(){
        return view('homeland.about');
    }

    public function login(){
        return view('homeland.login');
    }

    public function register(){
        return view('homeland.register');
    }

    public function properties(){
        return view('homeland.properties');
    }
}
