<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyListingType;
use App\Models\ContactAgent;
use App\Models\ContactAgentSubject;
use App\Mail\ContactFormMail; // Importa la clase de correo
use Illuminate\Support\Facades\Mail; // Importa la facade Mail


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

    public function contact(Request $request)
    {
        // Si el método es POST, procesar el formulario
        if ($request->isMethod("POST")) {
            // Validar los datos del formulario
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ], [
                'full_name.required' => 'The full name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'subject.required' => 'The subject field is required.',
                'message.required' => 'The message field is required.',
            ]);

            // Guardar los datos en la base de datos
            $contact = new ContactAgentSubject();
            $contact->full_name = $request->input("full_name");
            $contact->email = $request->input("email");
            $contact->subject = $request->input("subject");
            $contact->message = $request->input("message");
            $contact->save();

            // Enviar correo electrónico al administrador
            Mail::to('21030246@itcelaya.edu.mx')->send(new ContactFormMail(
                $request->input("full_name"),
                $request->input("email"),
                $request->input("subject"),
                $request->input("message")
            ));

            // Mostrar un mensaje de éxito
            session()->now("success", "Your message has been sent successfully!");
        }

        // Retornar la vista de contacto
        return view('homeland.contact');
    }

    public function buy(){
        $properties = Property::where("offer_type", "For Sale")->get();
        return view('homeland.buy', compact('properties'));
    }

    public function rent(){
        $properties = Property::where("offer_type", "For Sale")->get();
        return view('homeland.rent', compact('properties'));
    }
    public function properties_listing_type($properties_listing_type_id){
        //$properties = Property::where("property_listing_type_id", $listing_type_id)
        $properties = PropertyListingType::find($properties_listing_type_id)->properties;
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
        $properties =Property::all();
        return view('homeland.properties', compact('properties'));
    }
}
