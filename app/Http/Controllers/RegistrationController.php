<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create()
    {
    	return view('registration.create');
    }

    //Validate the form
    public function store(RegistrationForm $form)
    { 	
    	//Create and save the user
    	$form->persist();

        //session('message','Here is a default message');
        //session(['message' => 'Something custom']);
        session()->flash('message','Thanks so much for signing up!');

    	//Redirect to the home page
    	return redirect()->home();
    }
}
