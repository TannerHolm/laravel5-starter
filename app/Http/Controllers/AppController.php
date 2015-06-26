<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
  public function getIndex()
  {
  	if (Auth::check()) {
	  	return view('home');
	  } else {
  		return view('index');
  	}
  }
  
  public function getHome()
  {
  	
  }
  
}
