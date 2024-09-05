<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function congratulations(){
        if(!session('congratulations')){
            return redirect()->back();
        }
        $congratulations = session('congratulations');
        $message = session('message');
        return view('components.congratulations', compact('congratulations', 'message'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            // 'Street' => 'required|string',
            // 'City' => 'required|string',
            // 'Postcode' => 'required|string',
            'phone' => 'required|integer',
            'Email' => 'required|email',
            'message' => 'required|string',
        ]);

        $storeContactDetails = Contact::create([
            'name' => $request->name,
            'Street' => $request->Street,
            'City' => $request->City,
            'Postcode' => $request->Postcode,
            'phone' => $request->phone,
            'Email' => $request->Email,
            'message' => $request->message,
        ]);

        return $storeContactDetails ? redirect()->route('contact.congratulations')->with(['congratulations' => $storeContactDetails, 'message' => 'we have reply very soon']) : redirect()->back()->with('error', 'Someting Went Wrong');
    }
    public function subcribe(Request $request){
        return $request;
    }
}
