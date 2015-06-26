<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
  public function getIndex()
  {
  	if (Auth::check()) {
	  	$user = User::find(Auth::id());
	  	return view('home')
	  		->withUser($user);
	  } else {
  		return view('index');
  	}
  }
  
  public function getHome()
  {
  	
  }
  
}
