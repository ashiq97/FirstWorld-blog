<?php

namespace App\Http\Controllers;
use Session;

use App\Setting;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index()
    {
    	return view('admin.settings.setting')->with('settings',Setting::first());
    }

     public function update()
    {
    	// dd(request()->all()); // for testing purpose

    	$this->validate(request(),[
    		'site_name' => 'required',
    		'contact_number' => 'required',
    		'contact_email' => 'required',
    		'address' => 'required'
    	]);



    	$settings = Setting::first();

    	$settings->site_name = request()->site_name;
    	$settings->address = request()->address;
    	$settings->contact_number = request()->contact_number;
    	$settings->contact_email = request()->contact_email;

    	$settings->save();

    	Session::flash('success','settings Updated');

    	return redirect()->back();


    }
}
